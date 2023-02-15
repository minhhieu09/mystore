<?php

namespace App\Models;

use App\Models\ProductsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsColorModel extends Model
{
    use HasFactory;

    protected $table = 'products_color_models';
    protected $fillable = [
        'id',
        'name',
        'color_code'
    ];

    public function colors()
    {
        return $this->belongsTo(ProductsModel::class);
    }

    public function componentcolors(){
        return $this->hasMany(ProductComponentModel::class,'color_id');
    }
}
