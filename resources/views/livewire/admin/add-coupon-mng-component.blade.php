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
                            <span>Add New Coupon</span>
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
    							Add New Coupon
    						</div>
    						<div class="col-md-6">
    							<a href="{{ route('admin.coupons') }}" class="btn btn-success">All Coupons</a>
    						</div>
    					</div>
    				</div>
    				<div class="panel-body">
    					@if(Session::has('message')) 
    						<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    					@endif
    					<form class="form-horizontal" wire:submit.prevent="storeCoupon">
    						<div class="form-group">
    							<label class="col-md-4 control-label">Coupon Code</label>
    							<div class="col-md-4">
    								<input type="text" placeholder="Coupon Name" class="form-control input-md" wire:model="code"/>
                                     @error('code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
    							</div>
    						</div>

    						<div class="form-group">
    							<label class="col-md-4 control-label">Coupon Type</label>
    							<div class="col-md-4">
    								<select class="form-control" wire:model="type">
    									<option value="">Select</option>
    									<option value="fixed">Fixed</option>
    									<option value="percent">Percetange</option>
    								</select>
                                     @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
    							</div>
    						</div>

    						<div class="form-group">
    							<label class="col-md-4 control-label">Coupon Value</label>
    							<div class="col-md-4">
    								<input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value"/>
                                    @error('value')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
    							</div>
    						</div>


    						<div class="form-group">
    							<label class="col-md-4 control-label">Cart Value</label>
    							<div class="col-md-4">
    								<input type="text" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value"/>
    								<div class="text-info">Applies for Cart Value equal or great than {{ $cart_value }}</div>
                                    @error('cart_value')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
    							</div>
    						</div>
                            
                             <div class="form-group">
                                <label class="col-md-4 control-label">Expiry Date</label>
                                <div class="col-md-4" wire:ignore>
                                    <input type="text" placeholder="Expiry Date" id="expiry-date" class="form-control input-md" wire:model="expiry_date" autocomplete="off" />
                                    @error('expiry_date')
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

@push('scripts')
    <script>
        $(function(){
            $('#expiry-date').datepicker({
                dateFormat: 'yy-mm-dd',
                defaultDate: new Date() 
            })
            .on('change.dp',function(ev){
                var data = $('#expiry-date').val();
                @this.set('expiry_date',data);
            });
        });
    </script>
@endpush