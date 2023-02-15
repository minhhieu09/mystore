<?php

namespace App\Models;
use App\Models\products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_color extends Model
{
    use HasFactory;

    protected $table = 'products_colors';
    
    protected $fillable = [
        'name',
        'id',
        'color_code',
        'status'
    ];
    public function products_color(){
        return $this->belongsTo(products::class);
    }

    
}
