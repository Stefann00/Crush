<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Cart;
use Livewire\Component;
use Stripe;

class CheckoutComponent extends Component
{
	public $ship_to_different;
	public $notes;
	public $name;
	public $lastname;
	public $address1;
	public $address2;
	public $email;
	public $phone;
	public $city;
	public $province;
	public $country;
	public $zipcode;

	public $paymentmode;
	public $completedorder;

	public $s_name;
	public $s_lastname;
	public $s_address;
	public $s_email;
	public $s_phone;
	public $s_city;
	public $s_province;
	public $s_country;
	public $s_zipcode;

	public $card_no;
	public $exp_month;
	public $exp_year;
	public $cvc;

	public function updated($fields)
	{
		$this->validateOnly($fields,[
			'name' => 'required',
			'lastname' => 'required',
			'address1' => 'required',
			'email' => 'required|email',
			'phone' => 'required|numeric',
			'city' => 'required',
			'province' => 'required',
			'country' => 'required',
			'zipcode' => 'required',
			'paymentmode' => 'required',
			]);

		if($this->ship_to_different)
		{
			$this->validateOnly($fields,[
			's_name' => 'required',
			's_lastname' => 'required',
			's_address' => 'required',
			's_email' => 'required|email',
			's_phone' => 'required|numeric',
			's_city' => 'required',
			's_province' => 'required',
			's_country' => 'required',
			's_zipcode' => 'required',
			]);
		}

		if($this->paymentmode=='card')
		{
			$this->validateOnly($fields,[
				'card_no' => 'required|numeric',
				'exp_month' => 'required|numeric',
				'exp_year' => 'required|numeric',
				'cvc' => 'required|numeric',
			]);
		}
	}

	public function placeOrder()
	{
		$this->validate([
			'name' => 'required',
			'lastname' => 'required',
			'address1' => 'required',
			'email' => 'required|email',
			'phone' => 'required|numeric',
			'city' => 'required',
			'province' => 'required',
			'country' => 'required',
			'zipcode' => 'required',
			'paymentmode' => 'required',
		]);

		if($this->paymentmode=='card')
		{
			$this->validate([
				'card_no' => 'required|numeric',
				'exp_month' => 'required|numeric',
				'exp_year' => 'required|numeric',
				'cvc' => 'required|numeric',
			]);
		}

		$order = new Order();
		$order->user_id=Auth::user()->id;
		$order->subtotal=session()->get('checkout')['subtotal'];
		$order->discount=session()->get('checkout')['discount'];
		$order->total=session()->get('checkout')['total'];
		$order->firstname = $this->name;
		$order->lastname = $this->lastname;
		$order->address1 = $this->address1;
		$order->address2 = $this->address2;
		$order->email = $this->email;
		$order->phone = $this->phone;
		$order->city = $this->city;		
		$order->province = $this->province;
		$order->country = $this->country;
		$order->zipcode = $this->zipcode;
		$order->status = 'ordered';
		$order->is_shipping_different = $this->ship_to_different ? 1:0;
		$order->save();

		foreach(Cart::instance('cart')->content() as $item)
		{
			$orderItem = new OrderItem();
			$orderItem->product_id= $item->id;
			$orderItem->order_id = $order->id;
			$orderItem->price=$item->price;
			$orderItem->quantity=$item->qty;
			$orderItem->save();
		}

		if($this->ship_to_different)
		{
			$this->validate([
			's_name' => 'required',
			's_lastname' => 'required',
			's_address' => 'required',
			's_email' => 'required|email',
			's_phone' => 'required|numeric',
			's_city' => 'required',
			's_province' => 'required',
			's_country' => 'required',
			's_zipcode' => 'required',
			]);

			$shipping = new Shipping();
			$shipping->order_id=$order->id;
			$shipping->firstname = $this->s_name;
			$shipping->lastname = $this->s_lastname;
			$shipping->address = $this->s_address;
			$shipping->email = $this->s_email;
			$shipping->phone = $this->s_phone;
			$shipping->city = $this->s_city;		
			$shipping->province = $this->s_province;
			$shipping->country = $this->s_country;
			$shipping->zipcode = $this->s_zipcode;
			$shipping->save();
		}
		//cod=Cash On Delivery
		if($this->paymentmode == 'cod')
		{
			$this->makeTransaction($order->id,'pending');
			$this->resetCart();
		}
		else if($this->paymentmode=='card')
		{
			$stripe=Stripe::make(env('STRIPE_KEY')); // go pustame Stripe keyot

			try{
					$token = $stripe->tokens()->create([
						'card'=>[
							'number'=>$this->card_no,
							'exp_month'=>$this->exp_month,
							'exp_year'=>$this->exp_year,
							'cvc'=>$this->cvc
						]
					]);

					if(!isset($token['id']))
					{
						session()->flash('stripe_error','The stripe token was not generated correctly!');
						$this->completedorder=0;
					}

					$customer=$stripe->customers()->create([
					'name'=>$this->name . ' ' . $this->lastname,
					'email'=>$this->email,
					'phone'=>$this->phone,
					'address' => [
						'line1'=>$this->address1,
						'postal_code'=>$this->zipcode,
						'city'=>$this->city,
						'state'=>$this->province,
						'country'=>$this->country
					],
					'shipping'=>[
						'name'=>$this->name . ' ' . $this->lastname,
						'address' =>[
							'line1'=>$this->address1,
							'postal_code'=>$this->zipcode,
							'city'=>$this->city,
							'state'=>$this->province,
							'country'=>$this->country
						],
					],
					'source'=>$token['id']
					]);

					$charge=$stripe->charges()->create([
					'customer'=>$customer['id'],
					'currency'=>'USD',
					'ammount'=>session()->get('checkout')['total'],
					'description'=>'Payment for order no.' . $order->id
					]);

					if($charge['status']=='succeeded')
					{
						$this->makeTransaction($order->id,'Approved');
						$this->resetCart();
					}
					else
					{
						session->flash('stripe_error','Error in Transaction!');
						$this->completedorder=0;
					}

				} /* try */catch(Exceptionp $e)
				{
					session()->flash('stripe_error',$e->getMessage());
					$this->completedorder=0;
				}
		}
	}

		public function resetCart()
		{
			$this->completedorder=1;
			Cart::instance('cart')->destroy(); // Napravena e poracka zatoa kosnickata se brisi.
			session()->forget('checkout'); // se brisi subtotal i total od session.
		}

	    public function makeTransaction($order_id,$status)
		{
			$transaction = new Transaction();
			$transaction->user_id = Auth::user()->id;
			$transaction->order_id = $order_id;
			$transaction->mode = $this->paymentmode;
			$transaction->status=$status;
			$transaction->save();
		}


	// Ne ostavame direkten vlez preku URL!
	public function verifyUser()
	{
		if(!Auth::check())
		{
			return redirect()->route('login');
		}
		else if($this->completedorder)
		{
			return redirect()->route('ordercompleted');
		}
		else if(!session()->get('checkout'))
		{
			return redirect()->route('product.cart');
		}
	}

    public function render()
    {
    	$this->verifyUser();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
