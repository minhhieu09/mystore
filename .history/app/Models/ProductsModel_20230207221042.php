<?php

namespace App\Models;
use App\Models\ProductsColorModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table = 'products_model';

    
    public function productscolor(){
        return $this->hasMany(ProductsColorModel::class);
    }
}
