<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fashion
        $fashion = \App\Models\ProductCategory::create([
            'name' => 'Fashion',
            'slug' => \Illuminate\Support\Str::slug('Fashion'),
            'description' => 'Clothing, shoes, and accessories.',
        ]);

        // Subcategories of Fashion
        $this->createSubcategories($fashion, [
            "Men's Wear",
            "Women's Wear",
            "Men's Shoes",
            "Women's Shoes",
            "Jackets",
            "Hand Bags",
            "Wallets",
            "Jewelry",
            "Kids Clothes",
        ]);

        // Books
        $books = \App\Models\ProductCategory::create([
            'name' => 'Books',
            'slug' => \Illuminate\Support\Str::slug('Books'),
            'description' => 'Various books.',
        ]);

        // Subcategories of Books
        $this->createSubcategories($books, [
            "Kids Books",
            "Story Books",
            "Medical Books",
            "Research Books",
        ]);

        // Stationery
        $stationery = \App\Models\ProductCategory::create([
            'name' => 'Stationery',
            'slug' => \Illuminate\Support\Str::slug('Stationery'),
            'description' => 'Pencil cases, bottles, and school bags.',
        ]);

        // Subcategories of Stationery
        $this->createSubcategories($stationery, [
            "Pencil Cases",
            "Bottles",
            "School Bags",
        ]);
    }

    /**
     * Create subcategories for a given parent category.
     *
     * @param \App\Models\ProductCategory $parentCategory
     * @param array $subcategories
     */
    private function createSubcategories(\App\Models\ProductCategory $parentCategory, array $subcategories): void
    {
        foreach ($subcategories as $subcategoryName) {
            $subcategory = \App\Models\ProductCategory::create([
                'name' => $subcategoryName,
                'slug' => \Illuminate\Support\Str::slug($subcategoryName),
                'parent_id' => $parentCategory->id,
            ]);
        }
    }
}
