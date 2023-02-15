<?php

namespace App\Models;

use App\Models\products_color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function colors()
    {

        return $this->hasOne(products_color::class,'id','color_id');

    }
}
