<?php

namespace App\Livewire;

use App\Models\Item;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Boolean;

class AddtoCart extends Component
{
    public $item;

    public function mount($item_id)
    {
        $this->item = Item::find($item_id);
    }

    public function render()
    {
        $existence_check = Cart::search(function($cartItem, $rowId) {
            return $cartItem->id->id == $this->item->id;
        });

        return view('livewire.addto-cart')->layout("layouts.guest")->with(['existence_check' => $existence_check]);
    }

    public function addToCart()
    {

        $existence = Cart::search(function($cartItem, $rowId) {
            return $cartItem->id->id == $this->item->id;
        });

        if (!$existence || $existence->count() == 0) {
            $cart = Cart::add($this->item, $this->item->title, 1, $this->item->price);
        }

        return redirect(request()->header('Referer'));


    }
}
