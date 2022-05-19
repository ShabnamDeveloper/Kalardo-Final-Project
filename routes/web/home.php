<?php

use App\Helpers\Cart\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ActiveCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\OrderController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Catalog\Auth\TokenController;
use App\Http\Controllers\Catalog\Cart\AddressController;
use App\Http\Controllers\Catalog\Cart\ShipController;
use App\Http\Controllers\Catalog\Cart\ShopController;
use App\Http\Controllers\Catalog\Common\CityController;
use App\Http\Controllers\Catalog\Product\ProductDetailsController;
use App\Http\Controllers\Catalog\IndexController;





Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/cart',function(){
    Cart::get('2');
});

Route::namespace('\App\Http\Controllers')->group(function() {
    Route::resource('products', ProductController::class);
});

$cart = new App\Helpers\Cart\CartService();

Route::namespace('\App\Http\Controllers')->group(function() {
    Route::resource('products', ProductController::class);
});

Route::get('/cart', [CartController::class, 'cart']);
Route::get('/cart2', [CartController::class, 'cart2']);
Route::get('/cart1', [CartController::class, 'cart1']);
Route::get('/Profile', [ProfileController::class, 'Profile']);
Route::get('/DetailProduct', [DetailProductController::class, 'Detail.product']);
Route::get('/Order', [OrderController::class, 'Order']);
Route::get('/confirmPassword', [ConfirmPasswordController::class, 'confirmPassword']);
Route::get('/ForgotPassword', [ForgotPasswordController::class, 'ForgotPassword']);
Route::get('/Login', [LoginController::class, 'Login']);
Route::get('/Register', [RegisterController::class, 'Register']);
Route::get('/ResetPassword', [ResetPasswordController::class, 'ResetPassword']);
Route::get('/Verification', [VerificationController::class, 'Verification']);
Route::get('/Token', [TokenController::class, 'Token']);
Route::get('/Address', [AddressController::class, 'Address']);
Route::get('/Ship', [ShipController::class, 'Ship']);
Route::get('/Shop', [ShopController::class, 'Shop']);
Route::get('/City', [CityController::class, 'City']);
Route::get('/ProductDetails', [ProductDetailsController::class, 'ProductDetails']);
Route::get('/Index', [IndexController::class, 'Index']);
Route::get('/products/{product}', [ProductController::class, 'single']);
Route::patch('/cart/quantity/change', [CartController::class, 'quantityChange']);
Route::post('/comments', [HomeController::class, 'comment'])->name('send.comment');
Route::post('/payment', [PaymentController::class, 'payment'])->name('cart.payment');
Route::post('/cart/add/{product}' , [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::delete('/cart/delete/{cart}' , [CartController::class, 'deleteFromCart'])->name('cart.destroy');
Route::post('comments' , [HomeController::class, 'comment'])->name('send.comment');

?>