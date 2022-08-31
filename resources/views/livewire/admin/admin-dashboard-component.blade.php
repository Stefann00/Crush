<div>
    <script>
   /* var element = document.getElementById("category-mng"); 
         element.onclick = function(){ 
            alert("Test");
        } */
    function category() {
        var context = document.getElementById("context");
        context.innerHTML= "@livewire('admin.category-mng-component');"
        @livewire('admin.category-mng-component')
    }

  var elements = document.getElementsByTagName("a"); 
    for(var i=0; i<elements.length; i++){
    if (elements[i].id == 'category-mng') { 
         elements[i].onclick = function(){ 
           alert("yes link clicked!"); 
   }
 } 
}


</script>
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
                           <!-- DRZI SLOT -->
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
                                    <p style="font-size: 18px; padding-left: 93px;">Admin notice board:</p>
                                    
                            </div>
                            
                        </div>
                    </div>
                
                    <div class="row" id="context">
                    	<br/>
                       <p style="padding-left:100px; padding-top:100px; font-size: 18px;"><b>Welcome {{ Auth::user()->name }}! You have admin privileges!</b></p>
                    </div> <!-- Ova e za ROW -->
                        
                   
                </div>
            </div>
        </div>
    </section>
</div>
