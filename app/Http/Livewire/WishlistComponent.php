<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;


class WishlistComponent extends Component
{
	public function removeFromWishlist($product_id) {
        foreach(Cart::instance('wishlist')->content() as $witem) 
        {
            if($witem->id==$product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }

    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item sucessfully addded in yourt Cart!'); // Ako gi primi parametrite se zacuvuva vo sesija
        return redirect()->route('product.cart');
    } 


    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
