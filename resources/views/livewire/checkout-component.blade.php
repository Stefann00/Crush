<div id="main">    
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check-Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
        	<form wire:submit.prevent="placeOrder">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="checkout__form">
                <div class="billing_address">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                        	@if(Session::has('stripe_error'))
                        		<div class="alert alert-danger" role="alert">{{ Session::get('stripe_error') }}</div>
                        	@endif
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="{{ route('product.cart') }}">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" wire:model="name">
                                        @error('name')
                                        <span class="text-danger">
                                        	{{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" wire:model="lastname">
                                        @error('lastname')
                                        <span class="text-danger">
                                        	{{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                          
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address, housing, apartment" class="checkout__input__add" :value="old('address1')" wire:model="address1">
                                @error('address1')<span class="text-danger">
                                        	{{$message}}
                                 </span>@enderror
                                <input type="text" placeholder="Street Address, housing, apartment" wire:model="address2">
                                @error('address2')<span class="text-danger">
                                        	{{$message}}
                                 </span>@enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" wire:model="city">
                                @error('city')<span class="text-danger">
                                        	{{$message}}
                                 </span>@enderror
                            </div>
                            <div class="checkout__input">
                                <p>Province<span>*</span></p>
                                <input type="text" wire:model="province">
                                @error('province')<span class="text-danger">
                                        	{{$message}}
                                 </span>@enderror
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" wire:model="country">
                                @error('country')<span class="text-danger">
                                        	{{$message}}
                                 </span>@enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" wire:model="zipcode">
                                @error('zipcode')<span class="text-danger">
                                        	{{$message}}
                                 </span>@enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" wire:model="phone":>
                                        @error('phone')<span class="text-danger">
                                        	{{$message}}
                                 </span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" wire:model="email" :value="old('email')">
                                        @error('email')<span class="text-danger">
                                        	{{$message}}
                                 </span>@enderror
                                    </div>
                                </div>
                            </div>
                          
                            <div class="checkout__input__checkbox">
                                <label for="different_add">
                                    Ship to a different address
                                    <input type="checkbox" id="different_add" value="1" wire:model="ship_to_different">
                                </input>
                                    <span class="checkmark"></span>
                                </label>
                                <p>By selecting this field you agree to ship the items to an address different than the billing address!</p>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Note about your order, e.g, special note for delivery
                                    <input type="checkbox" id="diff-acc" value="1" wire:model="notes">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @if($notes)
	                            <div class="checkout__input">
	                                <p>Order notes<span>*</span></p>
	                                <input type="text"
	                                placeholder="Notes about your order, e.g. special notes for delivery." >
	                            </div>
                            @endif
                        </div>
                        @if(Session::has('checkout'))

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                	@foreach(Cart::instance('cart')->content() as $item)
                                    <li>{{ $item->name }} <span>$ {{$item->price}}</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>$ {{Session::get('checkout')['subtotal'] }}</span></li>
                                    <li>Total <span>$ {{Session::get('checkout')['total'] }}</span></li>
                                </ul>
        
                                <p><b>Choose your payment method:</b></p>
                                <div class="payment-method">
	                                <div class="checkout__input__checkbox">
	                                    <label for="cash">
	                                        Cash On Delivery
	                                        <input name="cash" type="radio" id="cash" value="cod" wire:model="paymentmode">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
	                                <div class="checkout__input__checkbox">
	                                    <label for="card">
	                                        Debit / Credit Card
	                                        <input type="radio" name="card" id="card" value="card" type="radio" wire:model="paymentmode">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
	                                <div class="checkout__input__checkbox">
	                                    <label for="paypal">
	                                        PayPal
	                                        <input type="radio" name="paypal" id="paypal" value="paypal" wire:model="paymentmode">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
                            	</div>
                            	@if($paymentmode=='card')
                            	<ul class="checkout__total__all">
                            		 <p><b>Card information:</b></p>
                                    <div class="col-lg-12">
		                                    <div class="checkout__input">
		                                        <p>Card Number:<span>*</span></p>
		                                        <input type="text"  wire:model="card_no" name="cardno" placeholder="Card Number">
		                                        @error('card_no')<span class="text-danger">
	                                        	{{$message}}
	                                 			</span>@enderror
		                                    </div>
		                                </div>
		                                <div class="row">
			                                <div class="col-lg-6">
			                                    <div class="checkout__input">
			                                        <p>Expiry Month:<span>*</span></p>
			                                        <input type="text"  wire:model="exp_month" name="exp-month" placeholder="MM">
			                                        @error('exp_month')<span class="text-danger">
		                                        	{{$message}}
		                                 			</span>@enderror
			                                    </div>
			                                </div>

			                                <div class="col-lg-6">
			                                    <div class="checkout__input">
			                                        <p>Expiry Year:<span>*</span></p>
			                                        <input type="text"  wire:model="exp_year" name="exp-year" placeholder="YYYY">
			                                        @error('exp_year')<span class="text-danger">
		                                        	{{$message}}
		                                 			</span>@enderror
			                                    </div>
			                                </div>
		                           		</div>

		                                <div class="col-lg-12">
		                                    <div class="checkout__input">
		                                        <p>CVC:<span>*</span></p>
		                                        <input type="password"  wire:model="cvc" name="cvc" placeholder="CVC">
		                                        @error('cvc')<span class="text-danger">
	                                        	{{$message}}
	                                 			</span>@enderror
		                                    </div>
		                                </div>
                                </ul>
        						@endif
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
     
	     	@if($ship_to_different)
		     	<div class="col-md-12">
		        			<div class="checkout__form">
		                <div class="billing_address">
		                    <div class="row">
		                        <div class="col-lg-8 col-md-6">
		                        	<p></p>
		                            <h6 class="checkout__title">Shipping Details</h6>
		                            <div class="row">
		                                <div class="col-lg-6">
		                                    <div class="checkout__input">
		                                        <p>Fist Name<span>*</span></p>
		                                        <input type="text"  wire:model="s_name">
		                                        @error('s_name')<span class="text-danger">
	                                        	{{$message}}
	                                 </span>@enderror
		                                    </div>
		                                </div>
		                                <div class="col-lg-6">
		                                    <div class="checkout__input">
		                                        <p>Last Name<span>*</span></p>
		                                        <input type="text"  wire:model="s_lastname">
		                                        @error('s_lastname')<span class="text-danger">
	                                        	{{$message}}
	                                 			</span>@enderror
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="checkout__input">
		                                <p>Address<span>*</span></p>
		                                <input type="text" placeholder="Street Address, Housing, Apartment" class="checkout__input__add"  wire:model="s_address">
		                                @error('s_address')<span class="text-danger">
	                                        	{{$message}}
	                                 	</span>@enderror
		                            </div>
		                            <div class="checkout__input">
		                                <p>Town/City<span>*</span></p>
		                                <input type="text"  wire:model="s_city">
		                                @error('s_city')<span class="text-danger">
	                                        	{{$message}}
	                                 	</span>@enderror
		                            </div>
		                            <div class="checkout__input">
	                                <p>Province<span>*</span></p>
	                                <input type="text" wire:model="s_province">
	                                @error('s_province')<span class="text-danger">
	                                        	{{$message}}
	                                 </span>@enderror
	                           		 </div>
		                            <div class="checkout__input">
		                                <p>Country/State<span>*</span></p>
		                                <input type="text"  wire:model="s_country">
		                                @error('s_country')<span class="text-danger">
	                                        	{{$message}}
	                                	 </span>@enderror
		                            </div>
		                            <div class="checkout__input">
		                                <p>Postcode / ZIP<span>*</span></p>
		                                <input type="text"  wire:model="s_zipcode">
		                                @error('s_postcode')<span class="text-danger">
	                                        	{{$message}}
	                                 </span>@enderror
		                            </div>
		                            <div class="row">
		                                <div class="col-lg-6">
		                                    <div class="checkout__input">
		                                        <p>Phone<span>*</span></p>
		                                        <input type="text"  wire:model="s_phone">
		                                        @error('s_phone')<span class="text-danger">
	                                        	{{$message}}
	                                			 </span>@enderror
		                                    </div>
		                                </div>
		                                <div class="col-lg-6">
		                                    <div class="checkout__input">
		                                        <p>Email<span>*</span></p>
		                                        <input type="text"  wire:model="s_email">
		                                        @error('s_email')<span class="text-danger">
	                                        	{{$message}}
	                                 			</span>@enderror
		                                    </div>
		                                </div>
		                            </div>

		                         
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
	    	 @endif

     	</div>
	</div>
     	</form>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>