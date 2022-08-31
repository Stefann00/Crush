<div>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Contact Us</h4>
                        <div class="breadcrumb__links">
                            <a href="/home">Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
        	@if(Session::has('message'))
	                	<div class="alert alert-success" style="margin-bottom:50px" role="alert">
	                		{{ Session::get('message') }}
	                	</div>
	             @endif
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>America</h4>
                                <p>195 E Parker Square Dr, Parker, CO 801 <br />+43 982-314-0958</p>
                            </li>
                            <li>
                                <h4>Romania (Europe)</h4>
                                <p>Strada Bratianu Ion-Constantin,32,Cluj-Napoca <br />+40(745)829765 </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="#" wire:submit.prevent="sendMessage">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" wire:model="name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email" wire:model="email">
                                     @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message" wire:model="message"></textarea>
                                    @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
</div>
