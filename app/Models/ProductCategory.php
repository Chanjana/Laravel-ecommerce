<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_image',
        'parent_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, "id", "category_id");
    }
}
