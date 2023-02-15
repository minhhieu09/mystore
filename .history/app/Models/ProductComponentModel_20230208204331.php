<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComponentModel extends Model
{
    use HasFactory;

    protected $table = 'product_component_models';

    public function images(){
        return $this->belongsTo()
    }
}
