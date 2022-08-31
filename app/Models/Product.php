<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";

    public function category()
	{
	return $this->belongsTo(Category::class,'category_id'); // gi spojva category_id (Product) so id od Category. Od product ke mozi da se pristapi klasata category sega. Pr. $categories->category->name - Eloquent
	}

	public function attributeValues()
	{
		return $this->hasMany(AttributeValue::class,'product_id');
	}

}

