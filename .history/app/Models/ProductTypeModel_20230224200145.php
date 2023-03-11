<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypeModel extends Model
{
    use HasFactory;

    protected $table = 'product_type_models';

    public $fillable = [
        'name',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'id', 'type');
    }
}
