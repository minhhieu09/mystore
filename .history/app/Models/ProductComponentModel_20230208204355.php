<?php

namespace App\Models;
use App\Models\ProductsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComponentModel extends Model
{
    use HasFactory;

    protected $table = 'product_component_models';

    public function images(){
        return $this->belongsTo(ProductsModel::class);
    }
}
