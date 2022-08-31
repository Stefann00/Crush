<div>
	  <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__text">
                        <h4>Profile</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="container" style="padding: 30px 0;">
  <div class="row">
    <div class="col-md-4">
      @if($user->profile->image)
					<img src="{{ asset('img/profile')}}/{{$user->profile->image}}" width="100%"></img>
					@else
					<img src="{{ asset('img/profile/default.png') }}" width="100%"></img>
					@endif

    </div>
    <div class="col-md-6">
      <p><b>Name:</b> {{$user->name}}</p>
					<p><b>Email:</b> {{$user->email}}</p>
					<p><b>Phone:</b> {{$user->profile->phone}}</p>
					<hr>
					<p><b>Address1:</b> {{$user->profile->address1}}</p>
					<p><b>Address2:</b> {{$user->profile->address2}}</p>
					<p><b>City:</b> {{$user->profile->city}}</p>
					<p><b>Province:</b> {{$user->profile->province}}</p>
					<p><b>Country:</b> {{$user->profile->country}}</p>
					<p><b>Zip Code:</b> {{$user->profile->zipcode}}</p>
    </div>
    <div class="col-sm">
    	<a href="{{ route('user.editprofile') }}" class="btn btn-info pull-right">Edit Profile</a>
    </div>

  </div>
</div>

   
</div>
