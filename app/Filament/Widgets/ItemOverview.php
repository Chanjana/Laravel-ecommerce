<?php

namespace App\Filament\Widgets;

use App\Enums\Role;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ItemOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Items", Item::count()),
            Stat::make("Sellers", User::where("role", 5)->count()),
            Stat::make("Buyers", User::where("role", 6)->count()),
            Stat::make("Orders", Order::whereNot("status", "cancelled")->count()),
        ];
    }

    public static function canView(): bool
    {
        return auth()->user()->role->value == Role::SuperAdministrator->value;
    }
}
