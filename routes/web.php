<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\OrderCompletedComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\HeaderSearchComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\ChangePasswordComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\CategoryMngComponent;
use App\Http\Livewire\Admin\ProductMngComponent;
use App\Http\Livewire\Admin\AddProductMngComponent;
use App\Http\Livewire\Admin\EditProductMngComponent;
use App\Http\Livewire\Admin\AddCategoryMngComponent;
use App\Http\Livewire\Admin\EditCategoryMngComponent;
use App\Http\Livewire\Admin\UserMngComponent;
use App\Http\Livewire\Admin\MngHomeSliderComponent;
use App\Http\Livewire\Admin\AddHomeSliderComponent;
use App\Http\Livewire\Admin\EditHomeSliderComponent;
use App\Http\Livewire\Admin\CouponMngComponent;
use App\Http\Livewire\Admin\AddCouponMngComponent;
use App\Http\Livewire\Admin\EditCouponMngComponent;
use App\Http\Livewire\Admin\MngOrderComponent;
use App\Http\Livewire\Admin\MngOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\MngAttributeComponent;
use App\Http\Livewire\Admin\MngAddAttributeComponent;
use App\Http\Livewire\Admin\MngEditAttributeComponent;
use App\Http\Livewire\Seller\SellerDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/registerseller',[MyController::class,"index"]);
Route::post('/addseller',[MyController::class,"addseller"]);

Route::get('/',HomeComponent::class); // Izvrsi ja HomeComponent klasata koja vrakja view od home-component blade + layout
Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');
Route::get('/search',HeaderSearchComponent::class)->name('product.search');
Route::get('/order-completed',OrderCompletedComponent::class)->name('ordercompleted');
Route::get('/contact-us',ContactComponent::class)->name('contact');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
// })->name('dashboard');



// FOR CUSTOMER/USER
Route::middleware(['auth:sanctum','verified'])->group(function()
{
	Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
	Route::get('/user/change-password',ChangePasswordComponent::class)->name('user.changepassword');
	Route::get('/user/profile',UserProfileComponent::class,'index')->name('user.profile');
	Route::get('/user/profile/edit',UserEditProfileComponent::class)->name('user.editprofile');
	Route::get('/user/orders',UserOrderComponent::class)->name('user.orders');
	Route::get('/user/order-details/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
});


// FOR ADMIN
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function()
{
	Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
	Route::get('/admin/category',CategoryMngComponent::class)->name('admin.categories');
	Route::get('admin/category/add',AddCategoryMngComponent::class)->name('admin.addcategory');
	Route::get('admin/category/edit/{category_slug}',EditCategoryMngComponent::class)->name('admin.editcategory');
	Route::get('admin/product',ProductMngComponent::class)->name('admin.products');
	Route::get('admin/product/add',AddProductMngComponent::class)->name('admin.addproduct');
	Route::get('admin/product/edit/{product_slug}',EditProductMngComponent::class)->name('admin.editproduct');
	Route::get('admin/users',UserMngComponent::class)->name('admin.users');
	Route::get('/admin/slider',MngHomeSliderComponent::class)->name('admin.homeslider');
	Route::get('/admin/slider/add',AddHomeSliderComponent::class)->name('admin.addhomeslider');
	Route::get('/admin/slider/edit/{slide_id}',EditHomeSliderComponent::class)->name('admin.edithomeslider');
	Route::get('/admin/coupons',CouponMngComponent::class)->name('admin.coupons');
	Route::get('/admin/coupon/add',AddCouponMngComponent::class)->name('admin.addcoupon');
	Route::get('/admin/coupon/edit/{coupon_id}',EditCouponMngComponent::class)->name('admin.editcoupon');
	Route::get('admin/orders',MngOrderComponent::class)->name('admin.orders'); 
	Route::get('admin/order-details/{order_id}',MngOrderDetailsComponent::class)->name('admin.orderdetails');
	Route::get('/admin/contact-messages',AdminContactComponent::class)->name('admin.contact');
	Route::get('/admin/product-attributes',MngAttributeComponent::class)->name('admin.attributes');
	Route::get('/admin/product-attributes/add',MngAddAttributeComponent::class)->name('admin.add_attribute');
	Route::get('/admin/product-attributes/edit/{attribute_id}',MngEditAttributeComponent::class)->name('admin.edit_attribute');

});
	


// FOR SELLER/ENTEPRENEUER
Route::middleware(['auth:sanctum','verified','authseller'])->group(function()
{
	Route::get('/seller/dashboard',SellerDashboardComponent::class)->name('seller.dashboard');

});

