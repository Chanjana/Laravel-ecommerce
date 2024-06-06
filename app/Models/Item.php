<?php

namespace App\Models;


use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;



    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'condition',
        'price',
        'description',
        'images',
        'availability'
    ];

    protected $casts = [ 
        'images' => 'array',
        'price' => 'float',
        'availability' => 'boolean'
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, "category_id", "id");
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, "item_id", "id");
    }


}
