<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(3)->create([
            'role' => Role::Seller->value
        ]);

        \App\Models\User::factory(10)->create([
            'role' => Role::Buyer->value
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => Role::SuperAdministrator->value,
        ]);

        $this->call([
            ProductCategorySeeder::class
         ]);

        Item::factory()->count(3)->create();

    }
}
