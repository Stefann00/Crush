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
                            <span>Add New Product</span>
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
                  ‎‎‏‏‎  Add New Product
                </div>
                <div class="col-md-3s">
                  <a href="{{ route('admin.products') }}" class="btn btn-success">All Products</a>
                </div>
              </div>
            </div>
            <div>
            	<br>
            </div>
            <div class="panel-body" style="background-color:lightgrey;">
             <!-- MESSAGE -->
             @if(Session::has('message'))
             	<div class="alert alert-success" role="alert">
             	{{Session::get('message')}}
             	</div>
             @endif
              <form class="form-horizontal" enctype="multiport/form-data" wire:submit.prevent="addProduct">
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Product Name</b></label>
                <div class="col-md-6">
                  <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Product Slug</b></label>
                <div class="col-md-6">
                  <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug"/>
                   @error('slug')
                  <p class="text-danger">{{$message}}</p>
                   @enderror

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Short Description</b></label>
                <div class="col-md-6" wire:ignore>
                  <textarea class="form-control" id="short_description" placeholder="Short Description" wire:model="short_description">
                  </textarea>
                   @error('short_description')
                  <p class="text-danger">{{$message}}</p>
                  @enderror

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Description</b></label>
                <div class="col-md-6" wire:ignore>
                  <textarea class="form-control" id="description" placeholder="Description" wire:model="description">
                  </textarea>
                   @error('description')
                  <p class="text-danger">{{$message}}</p>
                  @enderror

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Regular Price</b></label>
                <div class="col-md-6">
                  <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price"/>
                   @error('regular_price')
                  <p class="text-danger">{{$message}}</p>
                  @enderror

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>SKU</b></label>
                <div class="col-md-6">
                  <input type="text" placeholder="SKU" class="form-control input-md" wire:focus="generateSKU" wire:keyup="generateSKU" wire:model="SKU"/>
                   @error('SKU')
                  <p class="text-danger">{{$message}}</p>
                  @enderror

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Stock</b></label>
                <div class="col-md-6">
                  <select class="form-control" wire:model="stock_status">
                    <option value="instock">InStock</option>
                    <option value="outofstock">Out of Stock</option>
                  </select>
                   @error('stock_status')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Featured</b></label>
                <div class="col-md-6">
                  <select class="form-control" wire:model="featured">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"><b>Product Image</label>
                <div class="col-md-6">
                  <input type="file" class="input-file" wire:model="image"/>
                   @error('image')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  @if($image)
                  	<img src="{{ $image->temporaryUrl() }}" width="120"/>
                  @endif
                  </div>

                  <div class="form-group" style="padding:15px 0;">
                  <label class="col-md-4 control-label"><b>Product Gallery</label>
                <div class="col-md-6">
                  <input type="file" class="input-file" wire:model="images" multiple/>
                   @error('images')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  @if($images)
                    @foreach($images as $image)
                    <img src="{{ $image->temporaryUrl() }}" width="120"/>
                    @endforeach
                  @endif
                  </div>

                 <div class="form-group">
                 	<br/>
                  <label class="col-md-4 control-label"><b>Quantity</label>
                <div class="col-md-6">
                  <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity"/>
                   @error('quantity')
                   <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Select Category</label>
                <div class="col-md-6">
                  <select class="form-control" wire:model="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                   @error('category_id')
                   <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Product  Attributes</label>
                  <div class="row" style="padding-left: 13px">
                  <div class="col-md-5">
                    <select class="form-control" wire:model="attribute">
                        <option value="0">Select Attribute</option>
                        @foreach($attributes as $pattribute)
                         <option value="{{$pattribute->id}}">{{$pattribute->atname}}
                        </option>
                      @endforeach
                    </select>
                     @error('attribute_id')
                     <p class="text-danger">{{$message}}</p>
                      @enderror
                  </div>
                  <div class="col-md-1">
                    <button type="button" class="btn btn-info" wire:click.prevent="add">Add</button>
                  </div>
                </div>
                </div>

                @foreach($inputs as $key => $value)
                <div class="form-group">
                  <label class="col-md-4 control-label"><b> {{ $attributes->where('id',$attribute_arr[$key])->first()->atname }} </b></label>
                  <div class="row" style="padding-left:13px">
                  <div class="col-md-5">
                      <input type="text" placeholder="{{$attributes->where('id',$attribute_arr[$key])->first()->atname}}" class="form-control input-md" wire:model="attribute_values.{{$value}}"/>
                  </div>
                  <div class="col-md-1">
                      <button type="submit" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                      </div>
                  </div>
                </div>
                </div>
                @endforeach

                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                <div class="col-md-6">
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
</div>


@push('scripts')
<script>
    $(function(){
      tinymce.init({
        selector:'#short_description',
        setup:function(editor){
          editor.on('Change',function(e){
            tinyMCE.triggerSave();
            var sd_data = $('#short_description').val();
            @this.set('short_description',sd_data);
          });
        }
      });

      tinymce.init({
        selector:'#description',
        setup:function(editor){
          editor.on('Change',function(e){
            tinyMCE.triggerSave();
            var d_data = $('#description').val();
            @this.set('description',d_data);
          });
        }
      });

    });
</script>
@endpush
