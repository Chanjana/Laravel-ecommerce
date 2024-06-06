<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Notifications\Order\OrderPlaced;

class Checkout extends Component
{
    public $billing_details = [];
    public $shipping_details = [];
    public $card_details = [];
    public $billing;

    public $payment_method = "cod";
    public $cart_content;
    public $cart_total;
    public $cart_subtotal;
    public $shipping_fee = 450;


    public function mount()
    {
        // Initialize billing details with authenticated user's name and country
        $user = auth()->user();
        $this->billing_details['name'] = $user->name;
        $this->billing_details['country'] = "Sri Lanka";

        // Calculate cart subtotal and update shipping details
        $this->cart_subtotal = Cart::subtotal();
        $this->updatedShippingDetailsCountry($this->billing_details['country']);


    }

    //To render the Livewire component
    public function render()
    {
        return view('livewire.checkout')->layout("layouts.guest");
    }



    public function save()
    {
        $this->validate([
            "billing_details.name" => "required|string|max:255",
            "billing_details.phone" => "required|string|max:12",
            "billing_details.street_line_1" => "required|string|max:255",
            "billing_details.street_line_2" => "nullable|string|max:255",
            "billing_details.city" => "required|string|max:255",
            "billing_details.country" => "required|string|max:255",
            "billing_details.state" => "required|string|max:255",
            "billing_details.zip" => "required|string|max:255",
            "billing" => "boolean",
            "payment_method" => "required",

            "shipping_details.name" => "required|string|max:255",
            "shipping_details.phone" => "required|string|max:12",
            "shipping_details.street_line_1" => "required|string|max:255",
            "shipping_details.street_line_2" => "nullable|string|max:255",
            "shipping_details.city" => "required|string|max:255",
            "shipping_details.country" => "required|string|max:255",
            "shipping_details.state" => "required|string|max:255",
            "shipping_details.zip" => "required|string|max:255",

            "card_details.name" => "required_if:payment_method,'card'|string|max:255",
            "card_details.card_number" => "required_if:payment_method,'card'|string|max:16",
            "card_details.expiration_date" => "required_if:payment_method,'card'|string|max:4",
            "card_details.cvv" => "required_if:payment_method,'card'|string|max:3",
        ]);

        // To generate unique order code
        function genUserCode(){
            $order_id_code = [
                'order_code' => mt_rand(1000000000,9999999999)
            ];

            $rules = ['order_code' => 'unique:orders'];

            $validate = Validator::make($order_id_code, $rules)->passes();

            return $validate ? $order_id_code['order_code'] : genUserCode();
        }



        foreach (Cart::content()->groupBy("id.seller.id") as $groups) {

            foreach ($groups as $cart) {

                $shipping_details = $this->shipping_details;
                $shipping_details["shipping_fee"] = $this->shipping_fee;
                $shipping_details["cart_subtotal"] = $this->cart_subtotal;

                $order_id = 'TFLK' . genUserCode();

                $order_request = Order::create([
                    "user_id" => auth()->id(),
                    "seller_id" => $cart->id->seller->id,
                    "order_id" => $order_id,
                    "order_details" => $cart->id->id,
                    "total" => $this->cart_total,
                    "billing_details" => $this->billing_details,
                    "shipping_details" => $shipping_details,
                    "card_details" => (empty($this->card_details) && $this->payment_method == "cod") ? null : $this->card_details,
                    "payment_method" => $this->payment_method,
                    "status" => "processing"
                ]);

                // notify user by email about order placement
                auth()->user()->notify(new OrderPlaced($order_request->id));
            }
        }

        Cart::destroy();

        session()->flash("success", "Order Placed Successfully");

        return redirect()->route("thank-you");
    }

    //updatedProperty is a livewire -> lifecycle hook
    public function updatedBilling($value)
    {

        if ($value) {
            $this->shipping_details = $this->billing_details;

        } else {
            $this->shipping_details = [];
        }

    }

    public function updatedShippingDetailsCountry($value)
    {

        $different_sellers_shipping = Cart::content()->groupBy("id.seller.id")->count();

        if ($value == "Sri Lanka") {
            $this->shipping_fee = 450 * $different_sellers_shipping;
        } else {
           $this->shipping_fee = 4000 * $different_sellers_shipping;
        }
        $this->cart_total = Cart::subtotal() + $this->shipping_fee;
    }


}
