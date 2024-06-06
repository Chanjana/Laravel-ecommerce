<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "seller_id",
        "order_id",
        "billing_details",
        "shipping_details",
        "card_details",
        "payment_method",
        "order_details",
        "total",
        "status",
    ];

    protected $casts = [
        "billing_details" => 'array',
        "shipping_details" => 'array',
        "order_details" => 'array',
        "total" => 'float',
        "card_details" => 'encrypted:array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function item()
    {
        return $this->belongsTo(Item::class, "order_details", "id");
    }




}
