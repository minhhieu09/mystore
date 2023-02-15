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

    protected $fillable = [
        'name',
        'type'
    ]
    
    public function productscolor(){
        return $this->hasMany(ProductsColorModel::class,'id','color_id');
    }

    public function productcomponent(){
        return $this->hasMany(ProductComponentModel::class,'product_id','id');
    }

    
    
}
