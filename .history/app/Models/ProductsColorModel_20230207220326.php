<?php

namespace App\Models;

use App\Models\ProductsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsColorModel extends Model
{
    use HasFactory;

    protected $table = 'ProductsColorModel';
    protected $fillable = [
        'id', 
        'price',
    ];

    public function product(){
        return $this->belongsTo(ProductsModel::class,'id','color_id');
    }
}
