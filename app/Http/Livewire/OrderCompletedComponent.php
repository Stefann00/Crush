<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderCompletedComponent extends Component
{

    public function render()
    {
    	if(Auth::check())
    	{
    	$orders=Order::where('user_id',Auth::user()->id)->latest('created_at')->first();
    	return view('livewire.order-completed-component',['orders'=>$orders])->layout('layouts.base');
    	}
    	else 
    	{
    		return view('403')->layout('layouts.prazno');
    	}
        
    }
}
