<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\AttributeValue;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AddProductMngComponent extends Component
{
	use WithFileUploads;
	public $name;
	public $slug;
	public $short_description;
	public $description;
	public $regular_price;
	public $sale_price;
	public $SKU;
	public $stock_status;
	public $featured;
	public $quantity;
	public $image;
	public $category_id;
	public $images;

	public $attribute;
	public $inputs = [];
	public $attribute_arr = [];
	public $attribute_values;

	public function mount()
	{
		$this->stock_status='instock';
		$this->featured=0;
	}

	public function add()
	{
		if(!in_array($this->attribute,$this->attribute_arr))
		{
			array_push($this->inputs,$this->attribute);
			array_push($this->attribute_arr,$this->attribute);
		}
	}

	public function remove($attribute)
	{
		unset($this->inputs[$attribute]);
	}

	public function generateSlug()
	{
		$this->slug=Str::slug($this->name,'-');
	}

	public function generateSKU() 
	{
		$last_id = Product::max('id')+1;
		$this->SKU="PRDT".$last_id;
	}

	public function updated($fields)
	{
		$this->validateOnly($fields,[
			'name'=>'required',
			'slug'=>'required|unique:products',
		//	'short_description'=>'required',
		//	'description'=>'required',
			'regular_price'=>'required|numeric',
			'sale_price'=>'numeric',
			'SKU'=>'required',
			'stock_status'=>'required',
			'quantity'=>'required|numeric',
			'category_id'=>'required',
			'image'=>'required|mimes:jpeg,png,webp',
		]);
	}

	public function addProduct() 
	{
		$this->validate([
			'name'=>'required',
			'slug'=>'required|unique:products',
		//	'short_description'=>'required',
		//	'description'=>'required',
			'regular_price'=>'required|numeric',
		//	'sale_price'=>'numeric',
			'SKU'=>'required',
			'stock_status'=>'required',
			'quantity'=>'required|numeric',
			'category_id'=>'required',
			'image'=>'required|mimes:jpeg,png,webp',
		]);

		$product = new Product();
		$product->name=$this->name;
		$product->slug=$this->slug;
		$product->short_description=$this->short_description;
		$product->description=$this->description;
		$product->regular_price=$this->regular_price;
		$product->sale_price=$this->sale_price;
		$product->SKU=$this->SKU;
		$product->featured=$this->featured;
		$product->quantity=$this->quantity;
		$imageName=Carbon::now()->timestamp. '.' . $this->image->extension();
		$this->image->storeAs('products',$imageName);
		$product->image=$imageName;

		if($this->images)
		{
			$imagesname=' ';
			foreach($this->images as $key=>$image)
			{
				$imgName=Carbon::now()->timestamp. $key. '.' . $image->extension();
				$image->storeAs('products',$imgName);
				$imagesname=$imagesname . ',' . $imgName;
			}
			$product->images=$imagesname;
		}

		$product->category_id=$this->category_id;
		$product->save();

		foreach($this->attribute_values as $key=>$attribute_value)
		{
			$avalues = explode(",",$attribute_value);
			foreach($avalues as $avalue)
			{
				$attr_value=new AttributeValue();
				$attr_value->attribute_id=$key;
				$attr_value->value=$avalue;
				$attr_value->product_id = $product->id;
				$attr_value->save(); 
			}
		}

		session()->flash('message','A new product has been successfully created!');

	}

    public function render()
    {
    	$categories=Category::all();

    	$attributes=ProductAttribute::all();
        return view('livewire.admin.add-product-mng-component',['categories'=>$categories],['attributes'=>$attributes])->layout('layouts.base');
    }
}
