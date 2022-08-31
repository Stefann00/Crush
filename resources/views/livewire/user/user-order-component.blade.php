<div>


	<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__text">
                        <h4>Orders</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>My Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Orders -->
   <section>
   	<div class="container" style="padding-top:60px; padding-bottom:50px">
    <article class="card">
        <header class="card-header">My Orders</header>
        <div class="card-body">
        	<table class="table table-striped">
                       		<thead>
                       			<tr>
                       				<th>ID</th>
                       				<th>SubTotal</th>
                       				<th>Total</th>
                       				<th>First Name</th>
                       				<th>Last Name</th>
                       				<th>Phone</th>
                       				<th>Email</th>
                       				<th>Zipcode</th>
                       				<th>Status</th>
                       				<th>Order Date</th>
                       				<th>Action</th>
                       			</tr>
                       		</thead>
                       		<tbody>
                       			@foreach($orders as $order)
                       			<tr>
                       				<td>{{ $order->id }}</td>
                       				<td>${{ $order->subtotal }}</td>
                       				<td>${{ $order->total }}</td>
                       				<td>{{ $order->firstname }}</td>
                       				<td>{{ $order->lastname }}</td>
                       				<td>{{ $order->phone }}</td>
                       				<td>{{ $order->email }}</td>
                       				<td>{{ $order->zipcode }}</td>
                       				<td>{{ $order->status }}</td>
                       				<td>{{ $order->created_at }}</td>
                       				<td><a href="{{ route('user.orderdetails',['order_id'=>$order->id]) }}  "><i onMouseOver="this.style.color='green'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                       				
                       			</tr>
                       			@endforeach
                       		</tbody>
                       	</table>
        </div>
    </section>
</div>
