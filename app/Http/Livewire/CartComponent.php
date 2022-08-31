<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;

class CartComponent extends Component
{

	public $couponCode;
	public $discount;
	public $subtotalDiscount;
	public $totalDiscount;


	public function applyCouponCode()
	{
		$coupon=Coupon::where('code',$this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
		if(!$coupon)
		{
			session()->flash('cpnerror','Coupon code is invalid');
			return;
		}
		else 
		{
			session()->put('coupon',[
				'code'=>$coupon->code,
				'type'=>$coupon->type,
				'value'=>$coupon->value,
				'cart_value'=>$coupon->cart_value
			]);
		}
	}

	public function calculateDiscount()
	{
		if(session()->has('coupon'))
		{
			if(session()->get('coupon')['type']=='fixed')
			{
				$this->discount = session()->get('coupon')['value'];
			}
			else 
			{
				$this->discount = (Cart::instance('cart')->subtotal()*session()->get('coupon')['value'])/100;
			}
		$this->subtotalDiscount = Cart::instance('cart')->subtotal() - $this->discount;
		$this->totalDiscount = $this->subtotalDiscount; //+ shipping ako treba
		}
	}


	public function removeCoupon()
	{
		session()->forget('coupon');
	}

	public function deleteProduct($rowId)
	{
		Cart::instance('cart')->remove($rowId);
		$this->emitTo('cart-count-component','refreshComponent');
		session()->flash('success_message','Item removed from your cart!');
		
	}
	
	public function deleteAll() 
	{
		Cart::instance('cart')->destroy();
		$this->emitTo('cart-count-component','refreshComponent');
	}

	public function increaseQuantity($rowId) 
	{
		$product=Cart::instance('cart')->get($rowId);
		$qty=$product->qty+1;
		Cart::instance('cart')->update($rowId,$qty);
		$this->emitTo('cart-count-component','refreshComponent');
	}

	public function decreaseQuantity($rowId) 
	{
		$product=Cart::instance('cart')->get($rowId);
		$qty=$product->qty-1;
		Cart::instance('cart')->update($rowId,$qty);
		$this->emitTo('cart-count-component','refreshComponent');
	}

	public function checkout() 
	{
		if(Auth::check())
		{
			return redirect()->route('checkout');
		}
		else
		{
			return redirect()->route('login');	
		}
	}

	public function setAmountForCheckOut()
	{
		if(!Cart::instance('cart')->count()>0)
		{
			session()->forget('checkout');
			return;
		}
		
		if(session()->has('coupon'))
		{
			session()->put('checkout',[
				'discount'=>$this->discount,
				'subtotal'=>$this->subtotalDiscount,
				'total'=>$this->totalDiscount
			]);
		}
		else
		{
			session()->put('checkout',[
				'discount'=>0,
				'subtotal'=>Cart::instance('cart')->subtotal(),
				'total'=>Cart::instance('cart')->total()
			]);
		}
	}

    public function render()
    {
    	if(session()->has('coupon'))
    	{
    		if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) // proverva dali subtotal-ot e pogolem od toa so e namesteno vo kuponot
    		{
    			session()->forget('coupon');
    		}
    		else 
    		{
    			$this->calculateDiscount(); // ako cart_value e pogolema od subtotal togas pravi discount
    		}
    	}
    	$this->setAmountForCheckOut();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
