<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;


class CouponMngComponent extends Component
{
    public function deleteCoupon($coupon_id) 
    {
        $coupon=Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message','Coupon successfully deleted!');
    }

    public function render()
    {
    	$coupons=Coupon::all();
        return view('livewire.admin.coupon-mng-component',['coupons'=>$coupons])->layout('layouts.base');
    }


}
