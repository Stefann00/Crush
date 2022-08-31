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
                                    <p style="font-size: 18px; padding-left: 55px;">Web Management:</p>
                                 
                           		</div>

                            
                        	</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                   <a href="{{ route('admin.addhomeslider') }}" class="btn btn-success pull-right">Add New Slide</a>
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
                       				<th>Id</th>
                       				<th>Title</th>
                       				<th>SubTitle</th>
                       				<th>HighLight</th>
                       		    <th>Image</th>
                       				<th>Status</th>
                       				<th>Action</th>
                       			</tr>
                       		</thead>
                       		<tbody>
                       			@foreach($sliders as $slider)
                       			<tr>
                       				<td>{{$slider->id}}</td>
                       				<td>{{$slider->title}}</td>
                       				<td>{{$slider->subtitle}}</td>
                       				<td>{{$slider->highlight}}</td>
                       			  <td><img width="120" src="{{asset('img/hero')}}/{{$slider->image}}"/></td> 
                       				<td>{{$slider->status==1 ? 'Active':'Inactive'}}</td>
                       				<td><a href="{{ route('admin.edithomeslider',['slide_id'=>$slider->id])}}" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-edit fa-2x" style="font-size:24px"</a> ‎‎‏‏‎
                       					<a href="#" onclick="confirm('Are you sure you want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#1E90FF'" class="fa fa-trash" aria-hidden="true" style="font-size:24px" ></a>
                       				</td>
                       			</tr>
                       			@endforeach
                       		</tbody>
                       	</table>
                       </div
                    </div> <!-- Ova e za ROW -->
                </div>
                        
                   
                </div>
            </div>
        </div>
    </section>
</div>
