<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart; // naprajvme veke referinca vo alias, ova go koristi ShoppingcartServiceProvider
use App\Models\Category;


class HeaderSearchComponent extends Component
{

	public $sorting;
	public $pagesize;

	public $search;
	public $product_cat;
	public $product_id;

	public function mount() 
	{
		$this->sorting="default";
		$this->pagesize=12;
		$this->fill(request()->only('search')); // da objavi toa so e barano vo search, odnosno da go vnesi vo mount
	}
	public function store($product_id,$product_name,$product_price)
	{
		Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
		session()->flash('success_message','Item sucessfully addded in yourt Cart!'); // Ako gi primi parametrite se zacuvuva vo sesija
		return redirect()->route('product.cart');
	} 

    use WithPagination;
    public function render()
    {
    	if($this->sorting=="date")
    	{
    		$products=Product::where('name','LIKE','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
    	}
    	else if($this->sorting=="price")
    	{
    		$products=Product::where('name','LIKE','%'.$this->search.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
    	}
    	else if($this->sorting=="price-desc")
    	{
    		$products=Product::where('name','LIKE','%'.$this->search.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
    	}
    	else 
    	{

    		$products=Product::where('name','LIKE','%'.$this->search.'%')->paginate($this->pagesize); // daca e default merge pe asta
    	}

        $categories=Category::all();


        return view('livewire.header-search-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }

}
