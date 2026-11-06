<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_phone',
        'address_line',
        'city',
        'note',
        'payment_method',
        'payment_ref',
        'receipt_image',
        'subtotal',
        'shipping',
        'total',
        'status',
    ];
   

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
