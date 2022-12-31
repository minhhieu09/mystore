<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;

    protected $table = 'cart_model';

    public $fillable = [
        'order_id',
        'component_id',
        'amount',
        'customer_id',
        'total',
        'payment_type',
        'payment_number',
        'status',
    ];
}
