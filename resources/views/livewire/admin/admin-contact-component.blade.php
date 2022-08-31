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
                                    <p style="font-size: 18px; padding-left: 85px;">Contact Messages:</p>
                                 
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
                       	<table class="table table-striped">
                       		<thead>
                       			<tr>
                       				<th>#</th>
                       				<th>Name</th>
                       				<th>Email</th>
                       				<th>Message</th>
                       				<th>Sent At</th>
                       			</tr>
                       		</thead>
                       		<tbody>
                       			@foreach($contacts as $contact)
                       			<tr>
                       				<td>{{ $contact->id }}</td>
                       				<td>{{ $contact->name }}</td>
                       				<td>{{ $contact->email }}</td>
                              <td>{{ $contact->message }}</td>
                       				<td>{{ $contact->created_at }}</td>
                       			</tr>
                       			@endforeach
                       		</tbody>
                       	</table>
                      {{$contacts->links()}}
                       </div
                    </div> <!-- Ova e za ROW -->
                </div>
                        
                   
                </div>
            </div>
        </div>
    </section>
</div>
