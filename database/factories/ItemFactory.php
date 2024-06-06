<?php

namespace Database\Factories;

use App\Enums\Role;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $category = ProductCategory::inRandomOrder()->limit(1)->first();
        $user = User::where("role", Role::Buyer->value)->limit(1)->first();
        $product_title = $this->faker->title;
        $image = $this->faker->randomElement(
            [
                "item-images\/01HXXRT3BB5KQJ91FNH46P3YEN.jpg",
                "item-images\/01HXYF06VEFQQYYSXS75HBAS3J.jpg",
                "item-images\/01HXYF538FZBCN635TPPHPPG2A.jpg"
            ]);


        return [
            'category_id' => $category->id,
            'user_id' => $user->id,
            'title' => $product_title,
            'slug' => Str::slug($product_title),
            'condition' => $this->faker->randomElement(["new","used"]),
            'price' => $this->faker->randomElement([5000,4500, 7000]),
            'description' => $this->faker->paragraph,
            'images' => $image,
            'availability' => true
        ];
    }
}
