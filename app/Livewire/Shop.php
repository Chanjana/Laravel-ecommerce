<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\ProductCategory;
use Gloudemans\Shoppingcart\Facades\Cart as ProductCart;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{

    use WithPagination;
    public $conditions = [];
    public $categories = [];
    public $prices = [];
    public $pagination_no = 12;


    public function render()
    {

        $categories = ProductCategory::orderBy("name",  "asc")->get();



        return view('livewire.shop')
            ->layout("layouts.guest")
            ->with([
                "product_categories" => $categories,
                "items" => $this->filter()
            ]);
    }


    public function filter()
    {
        $items = Item::when($this->categories, function ($query) {
                $query->whereIn("category_id", $this->categories);
        })->when($this->conditions, function($query) {
            $query->whereIn("condition", $this->conditions);
        })->when($this->prices, function ($query) {
            foreach ($this->prices as $price) {
                if ($price == "2500") {
                    $query->orWhere("price","<=", 2500);
                }
                if ($price == "7500") {
                    $query->orWhereBetween("price",[2500, 7500]);
                }

                if ($price == "7500+") {
                    $query->orWhere("price", ">=", 7500);
                }
            }

        })->latest("created_at")
        ->paginate($this->pagination_no);

        return $items;
    }

    public function addToCart($item_id)
    {
        $item = Item::find($item_id);

        $existence = ProductCart::search(function($cartItem, $rowId) use($item) {
            return $cartItem->id->id == $item->id;
        });

//        dd($existence);

        if (!$existence || $existence->count() == 0) {
            ProductCart::add($item, $item->title, 1, $item->price);

        }

        return redirect(request()->header('Referer'));
    }





}
