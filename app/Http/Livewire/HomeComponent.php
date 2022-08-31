<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
    	$sliders=HomeSlider::where('status',1)->get();
    	$lproducts=Product::orderBy('created_at','DESC')->get()->take(4);
    	$sproducts = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(4);
        return view('livewire.home-component',['lproducts'=>$lproducts,'sliders'=>$sliders,'sproducts'=>$sproducts])->layout('layouts.base'); // Go stava home-component vo layout.base ksj {{ $slot }
    }
}
