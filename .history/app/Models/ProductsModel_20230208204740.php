<?php

namespace App\Models;
use App\Models\ProductsColorModel;
use App\Models\ProductComponentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table = 'products_models';
    
    public function productscolor(){
        return $this->hasOne(ProductsColorModel::class,'id','color_id');
    }

    public function productimage(){
        return $this->hasMany(ProductComponentModel::class,'product_id','id');
    }
}
