<div>
	  <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__text">
                        <h4>Profile</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Update Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div style="padding-top:30px"></div>
<div class="container" style="padding: 10px 0; border-style:solid; border-width:2px; border-color:lightgrey;">
	@if(Session::has('message'))
  		<div class="alert alert-success">{{ Session::get('message') }}</div>
  	@endif
  <div class="row" style="padding: 10px 10px;">
    <div class="col-md-4">
    	<form wire:submit.prevent="updateProfile">
      		@if($newimage)
					<img src="{{$newimage->temporaryUrl() }}" width="100%"></img>
					@elseif($image)
					<img src="{{ asset('img/profile')}}/{{$user->profile->image}}" width="100%"></img>
					@else
					<img src="{{ asset('img/profile/default.png') }}" width="100%"></img>
					@endif
					<input type="file" class="form-control" wire:model="newimage"/>

					
					<div class="container" style="padding: 40px 0 0 10px;">
					<p style="font-size: 15px; font-weight:bold;">Edit Account Settings:</p>
					<div class="col-sm">
    				<a href="{{ route('user.changepassword') }}" class="btn btn-info pull-left">Change Password</a>
    				</div>
    				</div>
    </div>
    <div class="col-md-6">
      				<p><b>Name:</b> <input type="text" class="form-control" wire:model="name"/></p>
					<p><b>Email:</b> <input type="text" class="form-control" value="{{ $email }}" readonly="readonly"/></p>
					<p><b>Phone:</b> <input type="text" class="form-control" wire:model="phone"/></p>
					<hr>
					<p><b>Address1:</b> <input type="text" class="form-control" wire:model="address1"/></p>
					<p><b>Address2:</b> <input type="text" class="form-control" wire:model="address2"/></p>
					<p><b>City:</b> <input type="text" class="form-control" wire:model="city"/></p>
					<p><b>Province:</b> <input type="text" class="form-control" wire:model="province"/></p>
					<p><b>Country:</b> <input type="text" class="form-control" wire:model="country"/></p>
					<p><b>Zip Code:</b> <input type="text" class="form-control" wire:model="zipcode"/></p>
					<button type="submit" class="btn btn-success pull-right">Update</button>
		</form>
    </div>
  </div>
</div>

   <div class="spacer" style="padding-bottom:30px"></div>
</div>
