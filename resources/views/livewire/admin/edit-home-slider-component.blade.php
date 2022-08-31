<div>
	<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Admin Dashboard</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="/admin/dashboard">Admin Dashboard</a>
                            <span>Add New Slider</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <div class="container" style="padding:30px 0; " >
    	<div class="row">
    		<div class="col-md-12">
    			<div class="panel panel-default">
    				<div class="panel-heading" style="padding-left:18px;">
    					<div class="row">
    						<div class="col-md-6">
    							Edit Slide
    						</div>
    						<div class="col-md-6">
    							<a href="{{ route('admin.homeslider') }}" class="btn btn-success">All Sliders</a>
    						</div>
    					</div>
    				</div>
    				<div class="panel-body" style="padding:20px 0;">
    					@if(Session::has('message')) 
    						<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    						@endif
    					<div class="row">
    						<div class="col-md-6">
    					<form class="form-horizontal" wire:submit.prevent="updateSlider">
    						<div class="form-group">
    							<label class="col-md-4 control-label"><b>Title</b></label>
    							<div class="col-md-6">
    								<input type="text" placeholder="Title Name" class="form-control input-md" wire:model="title"/>
    							</div>
    						</div>

    						<div class="form-group">
    							<label class="col-md-4 control-label"><b>Subtitle</b></label>
    							<div class="col-md-6">
    								<input type="text" placeholder="Subtitle Name" class="form-control input-md" wire:model="subtitle"/>
    							</div>
    						</div>

    						<div class="form-group">
    							<label class="col-md-4 control-label"><b>Highlighted text</b></label>
    							<div class="col-md-6">
    								<input type="text" placeholder="Highlighted text" class="form-control input-md" wire:model="highlight"/>
    							</div>
    						</div>

    						<div class="form-group">
    							<label class="col-md-4 control-label"><b>Link Button</b></label>
    							<div class="col-md-6">
    								<input type="text" placeholder="Title Link" class="form-control input-md" wire:model="link"/>
    							</div>
    						</div>

    						<div class="form-group">
    							<label class="col-md-4 control-label"><b>Image</b></label>
    							<div class="col-md-6">
    								<input type="file" class="input-file" wire:model="newimage">
    								@if($newimage)
    									<img src="{{$newimage->temporaryUrl()}}" width="120"/>
    								@else
    									<img src="{{asset('img/hero')}}/{{$image}}" width="120"/>
    								@endif
    								<p>(Recommended size: 1920x800)</p>
    							</div>
    						</div>

    						<div class="form-group">
    							<label class="col-md-4 control-label"><b>Status</b></label>
    							<div class="col-md-6">
    								<select class="form-control" wire:model="status">
    									<option value="0">Inactive</option>
    									<option value="1">Active</option>
    								</select>

    							</div>
    						</div>

    						<div class="form-group">
    							<label class="col-md-4 control-label"></label>
    							<div class="col-md-4">
    								<button type="submit" class="btn btn-primary">Update</button>

    							</div>
    						</div>
    					</form>
    				</div>
    				<div class="col-md-6" style="padding: 40px 0; padding-left: 22px;">
    					<span><b>LIVE Preview v1.0:</b></span>
    					@if($newimage)
    					<div class="wrapper" style="padding: 20px 0;">
    					<div class="container1" style="padding-top: 10px; padding-bottom:10px; background-color:lightgrey">
						<img src="{{$newimage->temporaryUrl()}}" width="800"/>
    					<div class="container2">
    					<div class="centered">{{ $title }}</div>
    					<div class="highlight">{{ $highlight }}</div>
    					<div class="subtitle">{{ $subtitle }}</div>
    					</div>
    					</div>	
    					@else
    					<div class="wrapper" style="padding: 20px 0;">
    					<div class="container1" style="padding-top: 10px; padding-bottom:10px; background-color:lightgrey">
						<img src="{{asset('img/hero')}}/{{$image}}" width="800"/>
						<div class="container2">
    					<div class="centered">{{ $title }}</div>
    					<div class="highlight">{{ $highlight }}</div>
    					<div class="subtitle">{{ $subtitle }}</div>
    					</div>
    					</div>
    					</div>	
    					@endif
    				</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div> 
</div>

<style>
 .container1 {
  position: relative;
  color:black;

}

 .container2 {
  width:60%;
  height:100%;
  position: absolute;
  color:black;
  left: 20%;
  transform: translate(-50%, -50%);

}

.centered {
  padding-left:25%;
  position:relative;
  top: 50%;
  display:block;
  font-weight: bold;
  top:0%;
  max-width: 100%;
  color: black;
}

.highlight {
  padding-left:25%;
  position:relative;
  top: -15%;
  display:block;
  max-width: 100%;
  text-transform: uppercase;
  color: orange;
  font-size: 10px;
}


.subtitle {
  padding-left:25%;
  position:relative;
  top: 3%;
  display:block;
  max-width: 100%;
  font-size: 10px;
}
</style>