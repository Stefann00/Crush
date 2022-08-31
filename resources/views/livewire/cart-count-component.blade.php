
    				@if(Cart::instance('cart')->count()>0)
                        <a href="/cart"><img src="{{ asset('img/icon/h-cart.png') }}" alt=""><span>{{ Cart::count() }}</span></a>
                        <div class="price">${{ Cart::instance('cart')->total() }}</div>
                        @endif
