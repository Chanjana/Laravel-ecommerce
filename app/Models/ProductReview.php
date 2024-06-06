<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "item_id",
        "rating",
        "comment"
    ];

    protected $casts = [
        "rating" => "integer"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function item()
    {
        return $this->belongsTo(Item::class, "item_id", "id");
    }
}
