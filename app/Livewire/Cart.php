<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as ProductCart;

class Cart extends Component
{
    public $total = 0;

    public function render()
    {

        $cart_content = ProductCart::content();
        $this->total = ProductCart::subtotal();


        return view('livewire.cart')->layout("layouts.guest")->with(["cart_content" => $cart_content]);
    }


    public function clearCart()
    {
        ProductCart::destroy();
    }

    public function removeItem($row_id)
    {
        ProductCart::remove($row_id);
        return redirect()->route("view-cart");
    }
}
