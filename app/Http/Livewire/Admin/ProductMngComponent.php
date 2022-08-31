<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductMngComponent extends Component
{
	public function deleteProduct($id) 
	{
		$product=Product::find($id);
		if($product->image)
		{
			unlink('img/products'.'/'.$product->image); // brisenje na slika
		}
		if($product->images)
		{
			$images=explode(",",$product->images);
			foreach($images as $image)
			{
				if($image)
				{
				unlink('img/products'.'/'.$image);
				}			
			}
		}
		$product->delete();
		session()->flash('message','You have successfully deleted the marked product!');
	}
	use WithPagination;
    public function render()
    {
    	$products=Product::paginate(5);
        return view('livewire.admin.product-mng-component',['products'=>$products])->layout('layouts.base');
    }
}
