<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order_item;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'full_name',
        'phone',
        'address',
        'province_id',
        'province_name',
        'city_id',
        'city_name',
        'district_id',
        'district_name',
        'postal_code',
        'courier',
        'weight',
        'subtotal',
        'shipping_cost',
        'total',
        'shipping_status',
        'status',
        'payment_status',
    ];

    protected $casts = [
        'subtotal'      => 'float',
        'total'         => 'float',
        'shipping_cost' => 'float',
        'weight'        => 'integer',
    ];

    // RELATION
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Order_item::class);
    }
}
