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
                                    <p style="font-size: 18px; padding-left: 85px;">Users Management:</p>
                                 
                           		</div>
                            
                        	</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                   <a href="#addseller" class="btn btn-success pull-right">Add New Seller</a>
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
                       				<th>Email</th>
                       				<th>Permissions</th>
                       				<th>Created at</th>
                       				<th>Action</th>
                       			</tr>
                       		</thead>
                       		<tbody>
                       			@foreach($users as $user)
                       			<tr>
                       				<td>{{$user->id}}</td>
                       				<td>{{$user->name}}</td>
                       				<td>{{$user->email}}</td>
                       				@if($user->utype=='USR')
                       				<td>User perms.</td>
                       				@elseif($user->utype=='ENT')
                       				<td>Seller perms.</td>
                       				@else 
                       				<td>Website Management</td>
                       				@endif
                       				<td>{{$user->created_at}}</td>

                       				<td><a href="#" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-edit fa-2x" style="font-size:24px"</a> ‎‎‏‏‎
                       					<a href="#" wire:click.prevent="function" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-trash" aria-hidden="true" style="font-size:24px" ></a>
                       				</td>
                       			</tr>
                       			@endforeach
                       		</tbody>
                       	</table>
                      {{$users->links()}}
                       </div
                    </div> <!-- Ova e za ROW -->
                </div>
                        
                   
                </div>
            </div>
        </div>
    </section>
</div>
