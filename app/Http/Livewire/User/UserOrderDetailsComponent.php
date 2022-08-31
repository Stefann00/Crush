<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrderDetailsComponent extends Component
{
	public $order_id;
	public $order_time;
	
	public function mount($order_id)
	{
		$this->order_id=$order_id;
	}

	public function cancelOrder()
	{
		$order=Order::find($this->order_id);
		$order->status='canceled';
		$order->canceled_date=Carbon::now();
		$order->save();
		session()->flash('message','Order has been canceled');
	}

    public function render()
    {
    	$order=Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user.user-order-details-component',['order'=>$order],['order_time'])->layout('layouts.base');
    }
}
