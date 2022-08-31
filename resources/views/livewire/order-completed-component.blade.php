<div>
    <style>
        body{
    background-color: #eee;
}
.card{
        background-color: #fff;
    width: 500px;
    border: none;
    border-radius: 16px;

}

.info{
      line-height: 19px;
}

.name{
    color: #4c40e0;
    font-size: 18px;
    font-weight: 600;
}

.order{
    font-size: 14px;
    font-weight: 400;
    color: #b7b5b5;
}
.detail{

    line-height:19px;
}

.summery{


        color: #d2cfcf;
    font-weight: 400;
    font-size: 13px;
}
   
}

.text{

    line-height:15px;
}
.new{

    color: #000;
    font-size: 14px;
    font-weight: 600;
}
.money{


    font-size: 14px;
    font-weight:500;
}
.address{

color: #d2cfcf;
    font-weight:500;
    font-size:14px;
}

.last{

    font-size: 10px;
    font-weight: 500;

}


.address-line{
    color: #4C40E0;
    font-size: 11px;
    font-weight: 700;
}
    </style>
   <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order Completed</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Check-Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <div class="container mt-5 d-flex justify-content-center" style="padding-bottom:50px">
       <div class="card p-4 mt-3">
          <div class="first d-flex justify-content-between align-items-center mb-3">
            <div class="info">
                @if($orders)
                <span class="d-block name">Thank you, {{ Auth::user()->name }}</span>
                <span class="order">Order no. {{ $orders->id }}</span>
            </div>
           
             <img src="https://i.imgur.com/NiAVkEw.png" width="40"/>
              

          </div>
              <div class="detail">
          <span class="d-block summery">Your order has been dispatched. we are delivering you order.</span>
              </div>
          <hr>
          <div class="text">
          @if($orders->shipping)
          <span class="d-block new mb-1" >{{ $orders->shipping->firstname }} {{ $orders->shipping->lastname }}</span>
          @else
          <span class="d-block new mb-1" >{{ $orders->firstname }} {{ $orders->lastname }}</span>
          @endif
         </div>
         @if($orders->shipping)
         <span class="d-block address mb-3">{{ $orders->shipping->address }}</span>
         @else
        <span class="d-block address mb-3">{{ $orders->address1 }}</span>
        @endif
          <div class="  money d-flex flex-row mt-2 align-items-center">
            <img src="https://i.imgur.com/ppwgjMU.png" width="20" />
            
            @if($orders->transaction->mode='cod')
            <span class="ml-2">Cash on Delivery</span> 
            @else
             <span class="ml-2">Card</span> 
            @endif

               </div>
               <div class="last d-flex align-items-center mt-3">
                <a href="{{ route('user.orders') }}"><span class="address-line">CHANGE ORDER SETTINGS</span></a>
                @else
                <h5>Access denied!</h5>
                <br/>
                <span style="text-align:center"><b>Error 403! You can't do this!</b></span>
               </div>
               @endif
        </div>
    </div>
</div>

