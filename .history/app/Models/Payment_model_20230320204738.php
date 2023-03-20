<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_model extends Model
{
    use HasFactory;

    protected $table = 'payment_models';

    public $fillable = [
        'order_id',
        'customer_id',
        'total',
        'payment_type',
        'payment_info',
        'status',
    ];

    public function customer(){
        
    }
}
