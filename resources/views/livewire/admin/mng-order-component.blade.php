<div>
  <link rel="stylesheet" href="{{ asset('css/orders.css') }}" type="text/css">
	<style>
		nav svg {
			height:20px;
		}
		nav .hidden{
			display: block !important;
		}
	</style>

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

    <!-- Order Begin -->
    <section class="shop spad">
        <div class="container">
           
                	<div class="col-lg-12"> <!-- GORE NAD CONTEXT -->
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="shop__product__option__left">
                                    <p style="font-size: 18px; padding-left: 85px;">Order Management:</p>
                                 
                           		</div>
                            
                        	</div>
                        	<div class="col-lg-6 col-lg-6">
                                <div class="shop__product__option__right">
                                  <a href="{{ route('admin.dashboard') }}" class="btn btn-success pull-right">Admin Dashboard</a>
                                </div>
                            </div>
                    </div>
                
                    <div class="row">
                    <div class="col-md-12">
                    	<br/>
                       <div style="padding-top:30px;">
                       	 @if(Session::has('message'))
                             <div class="alert alert-success" role="alert">{{Session::get('message')}}
                             </div>
                          @endif
                       	<table class="table table-striped">
                       		<thead>
                       			<tr>
                       				<th>ID</th>
                       				<th>SubTotal</th>
                       				<th>Discount</th>
                       				<th>Total</th>
                       				<th>First Name</th>
                       				<th>Last Name</th>
                       				<th>Phone</th>
                       				<th>Email</th>
                       				<th>Zipcode</th>
                       				<th>Status</th>
                       				<th>Order Date</th>
                       				<th colspan="2" class="text-center">Actions</th>
                       			</tr>
                       		</thead>
                       		<tbody>
                       			@foreach($orders as $order)
                       			<tr>
                       				<td>{{ $order->id }}</td>
                       				<td>{{ $order->subtotal }}</td>
                       				<td>{{ $order->discount }}</td>
                       				<td>{{ $order->total }}</td>
                       				<td>{{ $order->firstname }}</td>
                       				<td>{{ $order->lastname }}</td>
                       				<td>{{ $order->phone }}</td>
                       				<td>{{ $order->email }}</td>
                       				<td>{{ $order->zipcode }}</td>
                       				<td>{{ $order->status }}</td>
                       				<td>{{ $order->created_at }}</td>
                       				<td><a href="{{ route('admin.orderdetails',['order_id'=>$order->id]) }}  "><i onMouseOver="this.style.color='green'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                              <div class="dropdown">
                              <td>
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='#1E90FF'" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                  <li><a href="#" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='#1E90FF'" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Cancelled</a></li>
                                </ul>
                              </td>
                              </div>
                       				
                       			</tr>
                       			@endforeach
                       		</tbody>
                       	</table>
                      {{$orders->links()}}
                       </div
                    </div> <!-- Ova e za ROW -->
                </div>
                        
                   
                </div>
            </div>
        </div>
    </section>
</div>
