<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function colors()
    {

        return $this->hasOne('App\Models\products_color','color');

    }
}
