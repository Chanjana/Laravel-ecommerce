<?php

namespace App\Filament\Widgets;

use App\Enums\Role;
use Filament\Widgets\ChartWidget;
use App\Models\User;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Users by Type Chart';

    protected function getData(): array
    {

        $admins = User::where('role',Role::SuperAdministrator->value)->count();
        $sellers = User::where('role',Role::Seller->value)->count();
        $buyers = User::where('role',Role::Buyer->value)->count();


        return [
            'datasets' => [
                [
                    'label' => 'Users by Type',
                    'data' => [$admins, $sellers, $buyers],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ]
                ],
            ],
            'labels' => ['Admins', 'Sellers', 'Buyers'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    public static function canView(): bool
    {
        return auth()->user()->role->value == Role::SuperAdministrator->value;
    }
}
