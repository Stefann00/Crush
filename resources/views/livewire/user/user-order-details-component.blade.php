<div>
<link rel="stylesheet" href="{{ asset('css/orders.css') }}" type="text/css">
    <div class="container" style="padding-top:60px; padding-bottom:50px">
    <article class="card">
    	@if(Session::has('message'))
    	<div class="alert alert-success">
    		{{ Session::get('message') }}
    	</div>
    	@endif
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Order Number: <b>{{ $order->id }}</b> </h6>
            <article class="card1">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>3-5 DAYS FROM THE ORDER TIME
                     <span style="text-decoration: underline; font-size:12px"><br/>(FEATURE IN PROGRESS)</span></div>

                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col" style="text-align:center"> <strong>Status:</strong> <br> {{ $order->status }}</div>
                    <div class="col"> <strong>Tracking #:</strong> <br> This feature is momentarily unavailable </div>
                </div>
            </article>
            @if($order->status=='ordered')
            

            	@if($order->status=='ordered')
            	<div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> On the way </span>
                </div>
                @endif
            	{{--    @if($order->status=='shipping')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> On the way </span> </div>
                @else
                <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                @endif
              	--}}
            </div>
            @elseif($order->status=='delivered')
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> On the way </span> </div>
            </div>
            @else($order->status=='canceled')
            <div class="card1" style="padding-left:13px; padding-top: 15px; padding-bottom:5px;">
            <h5><b>Order Canceled!</b></h5>
            <br/>
            <p>You have canceled this order on {{ $order->canceled_date }}!</p>
           	</div>
            @endif

            <hr>
            <ul class="row">
            	@foreach($order->orderItems as $item)
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{ asset('img/products') }}/{{$item->product->image}}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{ $item->product->name }}<br> x{{$item->quantity}}</p> <span class="text-muted">
                            	@if($item->product->sale_price)
                            	${{ $item->product->sale_price }}
                            	@else
                            	${{ $item->product->regular_price }} 
                            	@endif
                            </span>
                        </figcaption>
                    </figure>
                </li>
                @endforeach
            </ul>
            <hr>
            <h5>Order Summary</h5>
            <p><b>SubTotal:</b> ${{$order->subtotal}}
            <br/>
            <b>Total:</b> ${{ $order->total }}</p>
             
            <p>Report any issues <a href="../../contact-us" style="a:hover: red">here</a></p>
            <hr>
            <a href="{{ route('user.orders') }}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            @if($order->status!=='canceled')
            <a href="{{ route('user.orders') }}" wire:click.prevent="cancelOrder" onclick="confirm('Are you sure you want to cancel this order?') || event.stopImmediatePropagation()" class="btn btn-warning" data-abc="true"> <i class="fa fa-ban"></i> Cancel Order</a>
            @endif
        </div>
    </article>
</div>
</div>
