<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Livewire\AddtoCart;
use App\Livewire\Shop;
use App\Models\Item;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShopTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_shop_page_can_be_rendered(): void
    {
        $response = $this->get(route('shop'));

        $response->assertStatus(200);
    }

    public function test_shop_page_can_be_viewed_by_a_buyer(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::where('role', Role::Buyer->value)
            ->inRandomOrder()
            ->limit(1)
            ->first();

        Livewire::actingAs($user)
            ->test(Shop::class)
            ->assertStatus(200);
    }

    public function test_product_can_be_added_to_cart(): void{

        $this->seed(DatabaseSeeder::class);

        $user = User::where('role', Role::Buyer->value)
            ->inRandomOrder()
            ->limit(1)
            ->first();

        $item = Item::inRandomOrder()->limit(1)->first();

        Livewire::actingAs($user)
            ->test(AddtoCart::class,['item_id' => $item->id])
            ->call('addToCart');

        $existence_check = Cart::search(function($cartItem, $rowId) use ($item) {
            return $cartItem->id->id == $item->id;
        });

        if($existence_check) {
            $this->assertTrue(true);
        }

        if($existence_check->count() == 0) {
            $this->assertTrue(false);
        }


    }


}
