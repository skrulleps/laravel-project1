<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey='id';
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
