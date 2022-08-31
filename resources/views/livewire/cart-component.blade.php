
 <div id="main">
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="/shop">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        @if(Session::has('success_message'))
                            <div id="alert" class="alert alert-success">
                                {{Session::get('success_message')}}
                            </div>
                        @endif
                        <table>
                            @if(Cart::instance('cart')->count() > 0)
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach(Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img href="{{route('product.details',['slug'=>$item->model->slug]) }}" src="{{ asset('img/products') }}/{{$item->model->image}}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $item->model->name }}</h6>
                                            <h5>$ {{ $item->model->regular_price }}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <span class="fa fa-angle-left dec qtybtn" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></span>
                                                <input type="text" value="{{$item->qty}}">
                                                <span class="fa fa-angle-right inc qtybtn" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ {{ $item->subtotal }}</td>
                                    <td class="cart__close"><i class="fa fa-close" wire:click.prevent="deleteProduct('{{ $item->rowId }}')"></i></td>
                                </tr>
                                @endforeach
                                @else
                                <div class="cart__empty">
                                <p><center><b>Your cart is empty!</b></center></p>
                                </div>
                                <br/>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/shop">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            @if(Cart::instance('cart')->count()>0)
                            <div class="continue__btn update__btn">
                                <a href="#" onclick="confirm('Are you sure you want to clear your cart?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAll"><i class="fa fa-spinner"></i> Clear cart</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if(Cart::instance('cart')->count()>0)
                <div class="col-lg-4">
                    @if(!Session::has('coupon'))
                    <div class="cart__discount">
                        <h6>Discount codes (Coupons)</h6>
                        @if(Session::has('cpnerror'))
                            <div class="alert alert-danger" role="danger">{{ Session::get('cpnerror') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="applyCouponCode">
                            <input type="text" placeholder="Coupon code" wire:model="couponCode">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    @endif
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>${{ Cart::instance('cart')->subtotal() }}</span></li>
                            @if(Session::has('coupon'))
                                <li>Discount ({{Session()->get('coupon')['code']}}) <a href="" wire:click.prevent="removeCoupon" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'" class="fa fa-times" style="color:black;font-size:18px"</a></a> <span>${{ $discount }}</span></li> 

                                <li>Subtotal with Discount <span>${{ $subtotalDiscount }}</span></li>
                                <li>Total<span>${{ $totalDiscount }}</span></li>
                            @else
                            <li>Total <span>${{ Cart::instance('cart')->total() }}</span></li>
                            @endif
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn" wire:click.prevent="checkout">Proceed to checkout</a>
                    </div>
                </div>
                @else
                <div class="col-lg-4">
                    <div class="cart__total">
                    <img src="{{ asset('img/banner/empty_cart.jpg') }}"></img>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>
