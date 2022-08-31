<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Carbon\Carbon;

class MngOrderComponent extends Component
{
	public function updateOrderStatus($order_id,$status)
	{
		$order=Order::find($order_id);
		$order->status=$status;
		if($status=="delivered")
		{
			$order->delivered_date=Carbon::now();
		}
		else if($status=="canceled")
		{
			$order->canceled_date=Carbon::now();
		}
		$order->save();
		session()->flash('message','Order status has been successfully updated!');
	}
    public function render()
    {
    	$orders=Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.mng-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
