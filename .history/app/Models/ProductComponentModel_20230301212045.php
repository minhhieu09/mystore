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
        'product_id',
        'memory',
        'color_id',
        'amount',
        'price',
        'image',
    ];

    public function images()
    {
        return $this->belongsTo(ProductsModel::class);
    }
    public function product()
    {
        return $this->belongsTo(ProductsModel::class, 'product_id', 'id');
    }
    public function memory()
    {
        return $this->belongsTo(ProductsModel::class);
    }
    public function component()
    {
        return $this->belongsTo(ProductComponentModel::class, 'id', 'color_id');
    }

    public function colors()
    {
        return $this->hasOne(ProductsColorModel::class, 'id', 'color_id');
    }
}
