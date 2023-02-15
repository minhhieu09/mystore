<?php

namespace App\Models;

use App\Models\ProductsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsColorModel extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'id', 
        'name',
        'color_code'
    ];

    public function colors(){
        return $this->belongsTo(ProductsModel::class,'id','color_id');
    }
}