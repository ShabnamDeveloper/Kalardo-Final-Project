<?php
namespace App\http\Controllers\Admin;

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Customer\CustomerGroupController;
use App\Http\Controllers\Admin\Order\ReturnOrderController;
use App\Http\Controllers\Admin\Product\AttributeController;
use App\Http\Controllers\Admin\Product\BrandCategoryController;
use App\Http\Controllers\Admin\Product\BrandController;
use App\Http\Controllers\Admin\Seller\SellerController;
use App\Http\Controllers\Admin\Show\AdditionalPageController;
use App\Http\Controllers\Admin\Show\BannerController;
use App\Http\Controllers\Admin\Show\FeaturedController;
use App\Http\Controllers\Admin\Show\MenuController;
use App\Http\Controllers\Admin\Support\SupportController;
use App\Http\Controllers\Admin\system\CityController;
use App\Http\Controllers\Admin\system\SettingController;
use App\Http\Controllers\Admin\system\TransportController;
use App\Http\Controllers\Admin\IndexContorller;
use App\Http\Controllers\Catalog\Auth\TokenController;
use App\Http\Controllers\Catalog\Auth\LoginController;


Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('permissions', PermissionController::class);
});

Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('users', UserController::class);
});

Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('products', ProductController::class);
});

Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('categories', categoryController::class);
});

Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('roles', RoleController::class);
});

Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('roles', RoleController::class);
});

Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('orders', OrderController::class);
});

Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('products.gallery', ProductGalleryController::class);
});

Route::get('/users/{user}/permissions', [User\PermissionController::class, 'create'])->name('users.permissions')->middleware('can:staff-user-permissions');
Route::post('/users/{user}/permissions', [User\PermissionController::class, 'store'])->name('users.permissions.store')->middleware('can:staff-user-permissions');
Route::get('orders/{order}/orders', [OrderController::class, 'payments'])->name('orders.payments');
Route::get('comments/unapproved', [CommentController::class, 'unapproved'])->name('comments.unapproved');

Route::namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::resource('comments', CommentController::class);
});

Route::get('/', [App\Http\Controllers\Catalog\IndexController::class, 'index']);

Route::get('/customform', function () {
    return view('customform');
});

Route::get('/coupon', function () {

    return view('newfiles.customCoupon');
});

Route::get('/customvendor', function () {
    return view('newfiles.vendor');
});

Route::get('/customorder', function () {
    return view('newfiles.order');
});

Route::get('/paymentt', function () {
    return view('livewire.catalog.pay');
});

Route::get('/customdiscount', function () {
    return view('newfiles.discount');
});

Route::get('/additional', function () {
    return view('newfiles.additional');
});

Route::get('/customcart', function () {
    return view('livewire.catalog.cart');
});

Route::get('/customProfile', function () {
    return view('newfiles.profile');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('customer',CustomerController::class)->except(['show','create','store']);
Route::resource('attribute', 'AttributeController');
Route::post('attribute/values', [AttributeController::class, 'getValues'])->name('attribute.value');


Route::middleware(('auth'))->group(function () {
    Route::get('ship', [App\Http\Controllers\Catalog\Cart\ShipController::class, 'index'])->name('ship');
    Route::get('/ship',App\Http\Livewire\Catalog\Shop\Ship::class)->name('ship');
    Route::get('/address',App\Http\Livewire\Catalog\Shop\Address::class)->name('ship.address');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [IndexContorller::class, 'index']);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('brand-category', BrandCategoryController::class);
    Route::post('attribute/values', [AttributeController::class, 'getValues'])->name('attribute.value');
    Route::resource('additionalPage', AdditionalPageController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('featured', FeaturedController::class);
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::Post('menu/update', [MenuController::class, 'update'])->name('menu.update');
    Route::resource('support', SupportController::class);
    Route::resource('city', CityController::class);
    Route::post('cities', CityController::class);
    Route::resource('state', App\Http\Controllers\Admin\system\StateController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', \App\Http\Controllers\Admin\system\RoleController::class);
    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
    Route::resource('transport', TransportController::class);
    Route::resource('user', UserController::class);
    Route::resource('product-alert', App\Http\Controllers\Admin\Product\ProductAlertController::class);
    Route::resource('customer', CustomerController::class)->except(['show', 'create', 'store']);
    Route::resource('customer-group', CustomerGroupController::class);
    Route::resource('attribute', 'AttributeController');
    Route::resource('order', OrderController::class);
    Route::resource('return-order', ReturnOrderController::class);
    Route::resource('seller', SellerController::class)->except(['store', 'create', 'show']);
    Route::resource('comment', CommentController::class)->only(['index', 'edit', 'destroy', 'update']);
    Route::resource('tag', App\Http\Controllers\Admin\Blog\TagController::class);
    Route::resource('post', App\Http\Controllers\Admin\Blog\PostController::class);
    Route::resource('category-post', App\Http\Controllers\Admin\Blog\CategoryPostController::class);
    Route::patch('approved/{comment}', [CommentController::class, 'approved'])->name('comment.approved');
});


Route::post('cities', [\App\Http\Controllers\Catalog\Common\CityController::class, 'getCitiesByStateId'])->name('get.cities');
Route::get('/auth', [LoginController::class, 'showLogin']);
Route::post('/auth', [LoginController::class, 'login'])->name('auth');
Route::get('/auth-token', [TokenController::class, 'getToken'])->name('authtoken');
Route::post('/auth-token', [TokenController::class, 'postToken'])->name('auth.token');
Route::get('post',\App\Http\Livewire\Admin\Post\AllPost::class);
Route::get('/product-details/{id}',\App\Http\Livewire\Catalog\Product\ProductDetails::class)->name('product-details');
Route::get('product-details/{slug}', [App\Http\Controllers\Catalog\Product\ProductDetailsController::class,'index']);
Route::get('shop', [\App\Http\Controllers\Catalog\Cart\ShopController::class, 'index'])->name('shop');
Route::get('cart', [\App\Http\Controllers\Catalog\Cart\CartController::class,'index'])->name('cart');
Route::get('/cart-delete/{product}', [\App\Http\Controllers\Catalog\Cart\CartController::class,'del_product'])->name('cart-delete');
Route::get('add-to-cart', \App\Http\Livewire\Catalog\Shop\AddToCart::class)->name('add-to-cart');
Route::get('change-quantity-product', \App\Http\Livewire\Catalog\Shop\ChangeQuantityProduct::class)->name('change-quantity-product');
Route::get('get-city-list', [\App\Http\Controllers\Admin\system\StateController::class, 'getCityList']);
Route::resource('address', \App\Http\Controllers\Catalog\Cart\AddressController::class);
Route::post('cities', [\App\Http\Controllers\Catalog\Common\CityController::class, 'getCitiesByStateId'])->name('cities');


?>

