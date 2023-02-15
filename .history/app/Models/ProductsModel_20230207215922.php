<?php

namespace App\Models;
use 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table = 'ProductsModel';

    public function productscolor(){
        return $this->hasMany('product')
    }
}
