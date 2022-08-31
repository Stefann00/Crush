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
                            <span>Edit Product Attribute</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <div class="container" style="padding:30px 0;">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<div class="row">
    						<div class="col-md-6">
    							Add New Attribute
    						</div>
    						<div class="col-md-6">
    							<a href="{{ route('admin.attributes') }}" class="btn btn-success">All Attributes</a>
    						</div>
    					</div>
    				</div>
    				<div class="panel-body">
    					@if(Session::has('message')) 
    						<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    					@endif
    					<form class="form-horizontal" wire:submit.prevent="updateAttribute">
    						<div class="form-group">
    							<label class="col-md-4 control-label">Attribute Name</label>
    							<div class="col-md-4">
    								<input type="text" placeholder="Attribute Name" class="form-control input-md" wire:model="name"/>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
    							</div>
    						</div>
    						<div class="form-group">
    							<label class="col-md-4 control-label"></label>
    							<div class="col-md-4">
    								<button type="submit" class="btn btn-primary">Submit</button>

    							</div>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div> 
</div>
