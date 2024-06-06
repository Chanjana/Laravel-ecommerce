<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Order;
use Livewire\Component;

class MarkItemDelivered extends Component
{

    public $order;
    public function mount($order_id)
    {
        $this->order = Order::find($order_id);
    }

    public function render()
    {
        return view('livewire.mark-item-delivered')->layout("layouts.guest");
    }

    public function markAsDelivered()
    {
        $this->order->update([
           "status" => "delivered"
        ]);

        return redirect()->route('dashboard');
    }
}
