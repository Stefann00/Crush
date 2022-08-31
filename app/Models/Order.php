<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    
    public function user()
    {
    	return $this->belongsTo(User::class); // invers OneToOne relatia
    }

    public function orderItems()
    {
    	return $this->hasMany(OrderItem::class);
    }

    public function shipping()
    {
    	return $this->hasOne(Shipping::class); // Shipping,OrderItem se Modelname
    }

    public function transaction() 
    {
    	return $this->hasOne(Transaction::class);
    }
}
