<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'customer_address',
        'customer_phone',
        'time',
        'payment_mode',
        'amount',
        'status',
    ];
}
