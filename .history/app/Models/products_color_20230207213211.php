<?php

namespace App\Models;
use
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_color extends Model
{
    use HasFactory;

    protected $table = 'products_color';
    
    protected $fillable = [
        'name',
        'id',
        'color_code',
        'status'
    ];
    public function products_color(){
        return $this->belongsTo('App\Models\products');
    }

    
}
