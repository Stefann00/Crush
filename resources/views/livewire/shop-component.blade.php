<div id="main">
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach($categories as $category)
                                                    <li><a href="{{ route('product.category',['category_slug'=>$category->slug])}}">{{ $category->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <li><a href="#">Louis Vuitton</a></li>
                                                    <li><a href="#">Chanel</a></li>
                                                    <li><a href="#">Hermes</a></li>
                                                    <li><a href="#">Gucci</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a> <span class="text-info">${{$min_price}} - ${{$max_price}}</span>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div id="slider" wire:ignore>
                                            </div>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                                <label for="xs">xs
                                                    <input type="radio" id="xs">
                                                </label>
                                                <label for="sm">s
                                                    <input type="radio" id="sm">
                                                </label>
                                                <label for="md">m
                                                    <input type="radio" id="md">
                                                </label>
                                                <label for="xl">xl
                                                    <input type="radio" id="xl">
                                                </label>
                                                <label for="2xl">2xl
                                                    <input type="radio" id="2xl">
                                                </label>
                                                <label for="xxl">xxl
                                                    <input type="radio" id="xxl">
                                                </label>
                                                <label for="3xl">3xl
                                                    <input type="radio" id="3xl">
                                                </label>
                                                <label for="4xl">4xl
                                                    <input type="radio" id="4xl">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                    </div>
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__color">
                                                <label class="c-1" for="sp-1">
                                                    <input type="radio" id="sp-1">
                                                </label>
                                                <label class="c-2" for="sp-2">
                                                    <input type="radio" id="sp-2">
                                                </label>
                                                <label class="c-3" for="sp-3">
                                                    <input type="radio" id="sp-3">
                                                </label>
                                                <label class="c-4" for="sp-4">
                                                    <input type="radio" id="sp-4">
                                                </label>
                                                <label class="c-5" for="sp-5">
                                                    <input type="radio" id="sp-5">
                                                </label>
                                                <label class="c-6" for="sp-6">
                                                    <input type="radio" id="sp-6">
                                                </label>
                                                <label class="c-7" for="sp-7">
                                                    <input type="radio" id="sp-7">
                                                </label>
                                                <label class="c-8" for="sp-8">
                                                    <input type="radio" id="sp-8">
                                                </label>
                                                <label class="c-9" for="sp-9">
                                                    <input type="radio" id="sp-9">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                                <a href="#">Product</a>
                                                <a href="#">Bags</a>
                                                <a href="#">Shoes</a>
                                                <a href="#">Fashio</a>
                                                <a href="#">Clothing</a>
                                                <a href="#">Hats</a>
                                                <a href="#">Accessories</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left" wire:model="pagesize">
                                    <p>Page Display:</p>
                                    <select class="nice-select">
                                        <option value="12">Default</option>
                                        <option value="16">16 Products per page</option>
                                        <option value="18">18 Products per page</option>
                                        <option value="20">20 Products per page</option>
                                        <option value="22">22 Products per page</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right" wire:model="sorting">
                                    <p>Sorting Options:</p>
                                    <select class="nice-select">
                                        <option value="default">Default</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @php
                        $witems=Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                             <!--   <div class="product__item__pic set-bg" data-setbg="{{ asset('img/products') }}/{{$product->image}}"> -->
                                    <div class="product__item__pic set-bg">
                                    <img class="product__item__pic set-bg"  src="<?php echo asset("img/products/$product->image")?>">
                                    <ul class="product__hover">
                                        @if($witems->contains($product->id))
                                        <li><a href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><img src="{{ asset('img/icon/heart-filled.png') }}" alt=""></a></li>
                                        @else
                                        <li><a href="#" wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        @endif
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="{{ route('product.details',['slug'=>$product->slug]) }}">
                                        <img src="{{ asset('img/icon/search.png') }}" alt="Details"><span>Details</span></a></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $product->name }}</h6>
                                    <div id="main">
                                    <a href="#" class="add-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" >+ Add To Cart</a>
                                    </div>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>${{ $product->regular_price }}</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div> <!-- Ova e za ROW -->
                       <!-- SALE ITEM 
                       <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                                    <span class="label">Sale</span>
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Multi-pocket Chest Bag</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$43.48</h5>
                                    <div class="product__color__select">
                                        <label for="pc-7">
                                            <input type="radio" id="pc-7">
                                        </label>
                                        <label class="active black" for="pc-8">
                                            <input type="radio" id="pc-8">
                                        </label>
                                        <label class="grey" for="pc-9">
                                            <input type="radio" id="pc-9">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        SALE END -->
                        
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                 {{ $products->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<style>
    /**** Custom styles for noUiSlider ****/
.noUi-connect {
  background-color: #555;

}

.noUi-horizontal .noUi-handle, .noUi-vertical .noUi-handle {
  background: black;
  display: inline-block;
  padding: 0.5em 1.2em;
  font-size: 75%;
  font-weight: 500;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  padding-right: 0.6em;
  padding-left: 0.6em;
  border-radius: 10rem;
  border-radius: 7rem 8rem 8rem 8rem / 4rem 5rem 6rem 6rem;
  color: #fff;
}
.noUi-target.noUi-horizontal .noUi-tooltip {
    background-color: #f2f1ed;
}

/**** Custom styles for Range ****/
input[type=range]::-webkit-slider-thumb {
  background-color: skyblue;
}
input[type=range]::-moz-range-thumb {
  background-color: skyblue;
}
input[type=range]::-ms-thumb {
  background-color: skyblue;
}
/* For the globe and the text inside */
input[type=range] + .thumb {
  background-color: blue;
}
input[type=range] + .thumb.active .value {
  color: #fff;
}
</style>

<script>
        var slider=document.getElementById('slider');
        noUiSlider.create(slider,{
            start: [1,1000],
            connect:true,
            range :{
                'min' : 1,
                'max' : 700
            },
            pips:{
                mode:'steps',
                stepped:true,
                density:4
            },

        });

        slider.noUiSlider.on('update',function(value)
        {
            @this.set('min_price',value[0]); // 0 index
            @this.set('max_price',value[1]); // 1 index
              // setam valoarea de la proprietate min_value si max value
        })
</script>
