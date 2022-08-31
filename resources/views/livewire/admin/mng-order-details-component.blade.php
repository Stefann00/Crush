<div>
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Admin Dashboard</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Admin Dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<!-- NOV ORDER -->

<div class="container py-5 h-100 w-100">
    <div class="row d-flex justify-content-center align-items-center h-100 w-100">
      <div class="col-lg-10 col-lg-10">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Order Number: <span style="color: #a8729a;">{{ $order->id }} @if($order->status=='canceled') <span style="color:red;">- ORDER CANCELED [{{$order->canceled_date}}]</span>@endif </span></h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Product details:</p>
            </div>
            <div class="card shadow-0 border mb-4">
              <div class="card-body">
                <div class="row">
                @foreach($order->orderItems as $item)
                  <div class="col-md-2">
                    <img src="{{ asset('img/products') }}/{{$item->product->image}}" alt="">
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0">{{ $item->product->name }}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">{{ $item->price }}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Attributes: FEATURE IN WORK!</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Qty: {{ $item->quantity }}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">${{ $item->price * $item->quantity }}</p>
                  </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                @endforeach
              </div>
            </div>
            
           
            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bold mb-0">Order Details</p>
            </div>

            <div class="d-flex justify-content-between pt-2">
            	<p class="text-muted mb-0"><span class="fw-bold me-4"><b>Subtotal</b></span> ${{$order->subtotal}}</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4"><b>Discount</b></span> ${{$order->discount}}</p>
            </div>

            <div class="d-flex justify-content-between mb-5">
              <p class="text-muted mb-0"><span class="fw-bold me-4"><b>Delivery Charges</b></span> Free</p>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Billing Details:</p>
            </div>

            <div class="col-lg-12">
            	<table class="table">
			  	<tr>
			  		<th>First Name</th>
			  		<td>{{ $order->firstname }}</td>
			  		<th>Last Name</th>
			  		<td>{{ $order->lastname }}</td>
			  	</tr>
			  	<tr>
			  		<th>Phone</th>
			  		<td>{{ $order->phone }}</td>
			  		<th>Email</th>
			  		<td>{{ $order->email }}</td>
			  	</tr>
			  	<tr>
			  		<th>Address1</th>
			  		<td>{{ $order->address1 }}</td>
			  		<th>Address2</th>
			  		<td>{{ $order->address2 }}</td>
			  	</tr>
			  	<tr>
			  		<th>City</th>
			  		<td>{{ $order->city }}</td>
			  		<th>Province</th>
			  		<td>{{ $order->province }}</td>
			  	</tr>
			  	<tr>
			  		<th>Country</th>
			  		<td>{{ $order->country }}</td>
			  		<th>Zipcode</th>
			  		<td>{{ $order->zipcode }}</td>
			  	</tr>
			  	</table>
            </div>

            <br/>
            @if($order->is_Shipping_different)
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Shipping Details:</p>
            </div>
             <div class="col-lg-12">
		        <table class="table">
			  	<tr>
			  		<th>First Name</th>
			  		<td>{{ $order->shipping->firstname }}</td>
			  		<th>Last Name</th>
			  		<td>{{ $order->shipping->lastname }}</td>
			  	</tr>
			  	<tr>
			  		<th>Phone</th>
			  		<td>{{ $order->shipping->phone }}</td>
			  		<th>Email</th>
			  		<td>{{ $order->shipping->email }}</td>
			  	</tr>
			  	<tr>
			  		<th>Address1</th>
			  		<td>{{ $order->shipping->address1 }}</td>
			  		<th>Address2</th>
			  		<td>{{ $order->shipping->address2 }}</td>
			  	</tr>
			  	<tr>
			  		<th>City</th>
			  		<td>{{ $order->shipping->city }}</td>
			  		<th>Province</th>
			  		<td>{{ $order->shipping->province }}</td>
			  	</tr>
			  	<tr>
			  		<th>Country</th>
			  		<td>{{ $order->shipping->country }}</td>
			  		<th>Zipcode</th>
			  		<td>{{ $order->shipping->zipcode }}</td>
			  	</tr>
			  	</table>
             </div>
            @endif

            <br/>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Transaction Details:</p>
            </div>
            <div class="col-lg-12">
            	<table class="table">
		  		<tr>
		  			<th>Transaction Mode</th>
		  			@if($order->transaction->mode='cod')
		  			<td>Cash On Delivery</td>
		  			@else
		  			<td>Card</td>
		  			@endif
		  		</tr>
		  		<tr>
		  			<th>Transaction Status</th>
		  			<td>{{ $order->transaction->status }}</td>
		  		</tr>
		  		<tr>
		  			<th>Transaction Date</th>
		  			<td>{{ $order->transaction->created_at }}</td>

		  		</tr>
	  			</table>
            </div>


          </div>
          <div class="card-footer border-0 px-4 py-5"
            style="background-color: #f5ebd5; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0"> <span style="color:black">Total
              paid:</span>  <span class="h2 mb-0 ms-2" style="color:black"> ${{ $order->total }}</span></h5>
          </div>


        </div>
      </div>
    </div>
  </div>

<!-- KRAJ -->

</div>