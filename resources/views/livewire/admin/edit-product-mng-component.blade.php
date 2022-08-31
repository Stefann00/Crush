<div>
 
<!-- STIL ZA MOBILEN - TABELA -->  
  <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Admin Dashboard</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="/admin/dashboard">Admin Dashboard</a>
                            <span>Edit Product</span>
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
                <div class="col-md-6" style="font-size:17px; font-weight:700;">
                  ‎‎‏‏‎  Edit Product
                </div>
                <div class="col-md-3s">
                  <a href="{{ route('admin.products') }}" class="btn btn-success">All Products</a>
                </div>
              </div>
            </div>
            <div>
            	<br>
            </div>
            <div class="panel-body">
             <!-- MESSAGE -->
             @if(Session::has('message'))
             	<div class="alert alert-success" role="alert">
             	{{Session::get('message')}}
             	</div>
             @endif
              <form class="form-horizontal" enctype="multiport/form-data" wire:submit.prevent="updateProduct">
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Product Name</b></label>
                <div class="col-md-4">
                  <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Product Slug</b></label>
                <div class="col-md-4">
                  <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Short Description</b></label>
                <div class="col-md-4">
                  <input type="text" placeholder="Short Description" class="form-control input-md" wire:model="short_description"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Description</b></label>
                <div class="col-md-4">
                  <input type="text" placeholder="Description" class="form-control input-md" wire:model="description"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Regular Price</b></label>
                <div class="col-md-4">
                  <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>SALE Price</b></label>
                <div class="col-md-4">
                  <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>SKU (only for Admins)</b></label>
                <div class="col-md-4">
                  <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Stock</b></label>
                <div class="col-md-4">
                  <select class="form-control" wire:model="stock_status">
                    <option value="instock">InStock</option>
                    <option value="outofstock">Out of Stock</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Featured</b></label>
                <div class="col-md-4">
                  <select class="form-control" wire:model="featured">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Product Image</label>
                <div class="col-md-4">
                  <input type="file" class="input-file" wire:model="newimage"/>
                  @if($newimage)
                  	<img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                  @else
                  	<img src="{{asset('img/products')}}/{{$image}}" width="120"/>
                  @endif
                  </div>

                  <div class="form-group" style="padding: 15px 0">
                  <label class="col-md-4 control-label"><b>Product Gallery</label>
                <div class="col-md-4">
                  <input type="file" class="input-file" wire:model="newimages" multiple/>
                  @if($newimages)
                    @foreach($newimages as $newimage)
                      @if($newimage)
                        <img src="{{$newimage->temporaryUrl()}}" width="120"/>
                      @endif
                    @endforeach
                  @else
                    @foreach($images as $image)
                      @if($image)
                      <img src="{{asset('img/products')}}/{{$image}}" width="120"/>
                      @endif
                    @endforeach
                  @endif
                  </div>

                 <div class="form-group">
                 	<br/>
                  <label class="col-md-4 control-label"><b>Quantity</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Select Category</label>
                <div class="col-md-4">
                  <select class="form-control" wire:model="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
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
            </div>
          </div>
        </div>
      </div>
    </div> 
</div>
