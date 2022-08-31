<div>
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

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                    	 <div class="shop__sidebar__search">
                           <!-- DRZI SLOT NAD ADMIN MENU-->
                        </div>
                        @livewire('admin.admin-navigation')
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                	<div class="col-lg-9"> <!-- GORE NAD CONTEXT -->
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p style="font-size: 18px; padding-left: 85px;">Coupon Management:</p>
                                 
                           		</div>
                            
                        	</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                   <a href="{{ route('admin.addcoupon') }}" class="btn btn-success pull-right">Add New Coupon</a>
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
                       				<th>Id</th>
                       				<th>Code</th>
                       				<th>Type</th>
                       				<th>Coupon Value</th>
                       				<th>Cart Value</th>
                              <th>Expiry Date</th>
                       				<th>Action</th>
                       			</tr>
                       		</thead>
                       		<tbody>
                       			@foreach($coupons as $coupon)
                       			<tr>
                       				<td>{{ $coupon->id }}</td>
                       				<td>{{ $coupon->code }}</td>
                              <td>{{ $coupon->type }}</td>
                       				@if($coupon->type == 'fixed')
                       				<td>${{ $coupon->value }}</td>
                       				@else
                       				<td>{{ $coupon->value }}%</td>
                       				@endif
                       				<td>{{ $coupon->cart_value }}</td>
                              <td>{{ $coupon->expiry_date }}</td>
                       				<td><a href="{{ route('admin.editcoupon',['coupon_id'=>$coupon->id]) }}" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-edit fa-2x" style="font-size:24px"</a> ‎‎‏‏‎
                       					<a href="#" onclick="confirm('Are you sure you want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-trash" aria-hidden="true" style="font-size:24px" ></a>
                       				</td>
                       			</tr>
                       			@endforeach
                       		</tbody>
                       	</table>
                       </div
                    </div> <!-- Ova e za ROW -->
                </div>
                        
                   
                </div>
            </div>
        </div>
    </section>
</div>
