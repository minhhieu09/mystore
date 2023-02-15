<?php

namespace App\Models;
use App\Models\ProductsColorModel;
use App\Models\ProductsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComponentModel extends Model
{
    use HasFactory;

    protected $table = 'product_component_models';

    public $fillable = [
        'name',
        'color_code'
    ];

    public function images(){
        return $this->belongsTo(ProductsModel::class);
    }

    public function memory(){
        return $this->belongsTo(ProductsModel::class);
    }
    public function component(){
        return $this->belongsTo(ProductComponentModel::class,'id)
    }

    public function colors(){
        return $this->hasOne(ProductsColorModel::class,'id','color_id');
    }

}
