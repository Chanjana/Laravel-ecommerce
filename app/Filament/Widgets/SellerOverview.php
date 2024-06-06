<?php

namespace App\Filament\Widgets;

use App\Enums\Role;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SellerOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Retrieve all orders associated with the authenticated seller, excluding cancelled orders.
        $orders = Order::whereHas("item", function($query) {
            $query->where("seller_id", auth()->id());
        })->whereNot("status", "cancelled")->get();

        $total_price = 0;

        foreach ($orders as $order) {
            $total_price += $order->item->price;
        }

        $sales_after_deducting = $total_price - ($total_price * config("app.sales_commission")/100);

        return [
            Stat::make("Total Sales", number_format($sales_after_deducting, 2, "."))
                ->description("Total sales after " . config("app.sales_commission") . "% is deducted")
                ->color("success"),
            // Stat for the total number of items from the seller
            Stat::make("Items", Item::where("user_id", auth()->id())->count()),
            Stat::make("Orders", $orders->count()),
        ];
    }

    public static function canView(): bool
    {
        // To check if the authenticated user's role is 'Seller'.
        return auth()->user()->role->value == Role::Seller->value;
    }
}
