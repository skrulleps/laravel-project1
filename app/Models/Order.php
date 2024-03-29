<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey='id';
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function produk(){
        return $this->belongsTo(Produk::class);
    }
    public function order_detail(){
        return $this->hasMany(Order_detail::class);
    }
}
