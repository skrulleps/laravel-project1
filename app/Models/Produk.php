<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $primaryKey='id';
    protected $timestamp=false;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function order_detail(){
        return $this->hasMany(Order_detail::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
}
