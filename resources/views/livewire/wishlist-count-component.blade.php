
                        @if(Cart::instance('wishlist')->count()>0)
                        <a href="{{ route('product.wishlist') }}"><img src="{{ asset('img/icon/w-heart.png') }}" alt="">
                        <span>‎‎‏‏‎‎‏‏‎‎‏‏‎ ‎‎‏‏‎‎‎‏‏‎{{ Cart::instance('wishlist')->count() }}‎‎‏‏‎ ‎‎‏‏‎‎‎‏‏‎‎‏‏</span></a>
                        @endif
