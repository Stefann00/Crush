<div>
 <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="/">Home</a>
                            <a href="../shop">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset('img/products')}}/{{ $product->image }}">
                                    </div>
                                </a>
                            </li>
                             @php
                             $images=explode(",",$product->images)
                            @endphp
                            @foreach($images as $image)
                            @if($image)
                            @if($tab>0)
                           <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-{{$tab+=1}}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset('img/products')}}/{{ $image }}">
                                    </div>
                                </a>
                            </li>
                            @endif
                            @endif
                            @endforeach
                            <!--<li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset('img/shop-details/thumb-4.png') }}">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                            </li> VIDEO -->
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ asset('img/products')}}/{{ $product->image }}" alt="">
                                </div>
                            </div>
                            @foreach($images as $image)
                            @if($image)
                            @if($tabs>0)
                            <div class="tab-pane" id="tabs-{{$tabs+=1}}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ asset('img/products')}}/{{ $image }}" alt="">
                                </div>
                            </div>
                            @endif
                            @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

        <div class="product__details__content">

            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{ $product-> name }}</h4>
                           <!-- 
                           	<div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>WORK IN PROGRESS!</span>
                            </div> -->
                            <h3>${{ $product->regular_price }}<span>{{ $product->sale_price }}</span></h3>
                            <p>{!! $product->short_description !!}</p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span><b>Size:</b></span>
                                    <label for="xxl">xxl
                                        <input type="radio" id="xxl">
                                    </label>
                                    <label class="active" for="xl">xl
                                        <input type="radio" id="xl">
                                    </label>
                                    <label for="l">l
                                        <input type="radio" id="l">
                                    </label>
                                    <label for="sm">s
                                        <input type="radio" id="sm">
                                    </label>
                                </div>
                                <div class="product__details__option__color">
                                    <span><b>Color:</b></span>
                                    @if($product->attributeValues->count()>0)
                                    @foreach($product->attributeValues as $av)
                                            @switch($av->value)
                                                @case('Black')
                                                <label class="c-1" for="sp-1">
                                                    <input type="radio" id="sp-1">
                                                </label>
                                                @break
                                                @case('Blue')
                                                <label class="c-2" for="sp-2">
                                                    <input type="radio" id="sp-2">
                                                </label>
                                                @break
                                                @case('Yellow')
                                                <label class="c-3" for="sp-3">
                                                    <input type="radio" id="sp-3">
                                                </label>
                                                @break
                                                @case('Red')
                                                <label class="c-4" for="sp-4">
                                                    <input type="radio" id="sp-4">
                                                </label>
                                                @break
                                                @case('White')
                                                <label class="c-5" for="sp-5">
                                                    <input type="radio" id="sp-5">
                                                </label>
                                                @break
                                                @default
                                                    
                                            @endswitch
                                    @endforeach
                                    @else
                                    <span>Unavailable</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" wire:model="quantity"></input>
                                    </div>
                                </div>
                                <a href="#" class="primary-btn" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$quantity}},{{$product->regular_price}})">add to cart</a>
                            </div>
                            <div class="product__details__btns__option">
                                <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <ul>
                                    <li><span>SKU:</span> {{ $product->SKU }}</li>
                                    <li><span>Categories:</span> {{ $product->category->name }}</li>
                                    <li><span>Availability:</span> {{ $product->stock_status }}</li>
                                    <li><span>Tag:</span> Clothes</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                            <!--    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">For more information regarding the process of purchasing refer to "Additional Information" !</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>{!! $product->description !!} </p>
                                        </div>
                                    </div>
                               </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Shopping Policies</h5>
                                            <ul>
                                                <li>If you’d like to return any product purchased on Crush Fashion Online Store, the return period is 30 days from the date of delivery. We will only accept unopened and unused products for return. </li>
                                                <li>No returns will be accepted without the customer having obtained a return authorization. Prior to returning your product, please refer to the contact page and open a ticket with a Subject line of “Online Store Product Return”.</li>
                                                <li>
                                                All products must be returned in their original packaging with original receipt and an explanation of the reason for the return. 
                                                </li>
                                                <li>
                                                We will refund 100% of the purchase price for returns that meet the above conditions.
                                                </li>
                                                <li>
                                                Returns are not accepted after 90 days from the day of purchase.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Billing Terms and Conditions</h5>
                                            <ul>
                                                <li>We accept Credit Cards (Master Card and Visa) and COD for payment of orders.  We do not accept PayPal, Amazon Payment, Bitcoin, Wire Transfer, check or money order. Before shipment, credit cards must clear authorization and will be charged at the time of order. </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">You may also like</h3>
                </div>
            </div>
            <div class="row">
            	@foreach($related_products as $r_product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">

                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo asset("img/products/$r_product->image")?>">
                     <!--       <span class="label">New</span> -->
                            <ul class="product__hover">
                                <li><a href="{{ route('product.details',['slug'=>$r_product->slug]) }}">
                                        <img src="{{ asset('img/icon/search.png') }}" alt="Details"><span>Details</span></a></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $r_product->name }}</h6>
                            <a href="#" class="add-cart" wire::click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>${{ $r_product->regular_price }}</h5>
                            <div class="product__color__select">
                                <label for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active black" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                                <label class="grey" for="pc-3">
                                    <input type="radio" id="pc-3">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
               
               
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Section End -->
</div>