<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Order;
use App\Models\ProductReview as ProductReviewModel;
use Livewire\Component;

class ProductReview extends Component
{
    public $item;
    public $rating;
    public $comment;

    public function mount($item_id)
    {
        $this->item = Item::find($item_id);
    }

    public function render()
    {

        // check if product has been delivered
        $item_check_if_delivered = Order::where([
            "order_details" => $this->item->id,
            "user_id" => auth()->id(),
            "status" => "delivered"
        ])->exists();

        // check if product has been reviewed by used already
        $review_existence = ProductReviewModel::where([
            "user_id" => auth()->id(),
            "item_id" => $this->item->id
        ])->exists();

        $reviews_for_item = ProductReviewModel::where([
            "item_id" => $this->item->id
        ])->paginate(10);


            return view('livewire.product-review')
                ->layout("layouts.guest")
                ->with([
                    "item_check_if_delivered" => $item_check_if_delivered,
                    "review_existence" =>  $review_existence,
                    "reviews" => $reviews_for_item
                ]);



    }

    public function save()
    {
        $this->validate([
            "rating" => ["required", "in:1,2,3,4,5"],
            "comment" => ['required',"string","max:4500"]
        ]);

        $review = ProductReviewModel::create([
            "user_id" => auth()->id(),
            "item_id" => $this->item->id,
            "rating" => $this->rating,
            "comment" => $this->comment
        ]);
    }
}
