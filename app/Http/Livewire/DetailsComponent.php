<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use App\Models\Category;

class DetailsComponent extends Component
{
	public $slug;
    public $quantity=1;
	public $tab=1;
	public $tabs=1;

	public function mount($slug) 
	{
		$this->slug=$slug;
	}

	public function store($product_id,$product_name,$product_qty,$product_price)
    {
        $quantity=$this->quantity;
        Cart::instance('cart')->add($product_id,$product_name,$quantity,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item sucessfully addded in yourt Cart!'); 
        return redirect()->route('product.cart');
    } 


    public function render()
    {
    	$product = Product::where('slug',$this->slug)->first();
    	$related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.details-component',['product'=>$product,'related_products'=>$related_products])->layout('layouts.base');
    }
}
