<div id="main">
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            <!-- WISHLIST PRODUCTS-->
            			@if(Cart::instance('wishlist')->content()->count()>0)
                        @php
                            $witems=Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach(Cart::instance('wishlist')->content() as $item)
                <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                    <div class="product__item__pic set-bg">
                                   <?php  $image=$item->model->image ?>
                                    <img class="product__item__pic set-bg"  src="<?php echo asset("img/products/$image")?>">
                                    <ul class="product__hover">
                                        @if($witems->contains($item->model->id))
                                        <li><a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><img src="{{ asset('img/icon/heart-filled.png') }}" alt=""></a></li>
                                        @else
                                        <li><a href="#" wire:click.prevent="addToWishList({{$item->model->id}},'{{$item->model->name}}',{{$item->model->regular_price}})"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        @endif
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="{{ route('product.details',['slug'=>$item->model->slug]) }}">
                                        <img src="{{ asset('img/icon/search.png') }}" alt="Details"><span>Details</span></a></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $item->name }}</h6>
                                    <div id="main">
                                    <a href="#" class="add-cart" wire:click.prevent="store({{$item->model->id}},'{{$item->model->name}}',{{$item->model->regular_price}})" >+ Add To Cart</a>
                                    </div>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>${{ $item->model->regular_price }}</h5>
                                </div>
                            </div>
                        </div>
                @endforeach
                @else
                <h4>Your wishlist is empty!</h4>
                @endif
            </div>
        </div>
    </section>
    <!-- Product Section End -->
                               
 </div>