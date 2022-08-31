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
                                    <p style="font-size: 18px; padding-left: 85px;">Product Management:</p>
                                 
                           		</div>
                            
                        	</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                   <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New Product</a>
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
                       				<th>Name</th>
                       				<th>Price</th>
                       				<th>Stock</th>
                       				<th>Quantity</th>
                       				<th>Category</th>
                       				<th>Date</th>
                       				<th>Action</th>
                       			</tr>
                       		</thead>
                       		<tbody>
                       			@foreach($products as $product)
                       			<tr>
                       				<td>{{$product->id}}</td>
                       				<td>{{$product->name}}</td>
                       				@if(($product->sale_price)>0)
                       				<td><u>${{$product->sale_price}}<i class="fa fa-tag" aria-hidden="true" style="font-size:20px;"> </i><span style="visibility:hidden;">Discount</span></u></td>
                       				@else
                       				<td>${{$product->regular_price}}</td>
                       				@endif
                       				<td>{{$product->stock_status}}</td>
                       				<td>{{$product->quantity}}</td>
                       				<td>{{$product->category->name}}</td>
                       				<td>{{$product->updated_at}}</td>

                       				<td><a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-edit fa-2x" style="font-size:24px"</a> ‎‎‏‏‎
                       					<a href="#" onclick="confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-trash" aria-hidden="true" style="font-size:24px" ></a>
                       				</td>
                       			</tr>
                       			@endforeach
                       		</tbody>
                       	</table>
                      {{$products->links()}}
                       </div
                    </div> <!-- Ova e za ROW -->
                </div>
                        
                   
                </div>
            </div>
        </div>
    </section>
</div>
