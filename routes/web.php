<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::prefix('admin_shop/product/api')->group(function(){
    Route::get('/admin-shop/categories',[App\Http\Controllers\Admin\CategoryController::class,'api_index']);
});
Route::prefix('admin_shop')->group(function(){
    Route::get('',[App\Http\Controllers\Admin\MainController::class,'index'])->name('Asli');
    Route::resource('category',App\Http\Controllers\Admin\CategoryController::class);
    Route::get('CreateCategoryAttribute\{category}',[App\Http\Controllers\Admin\CategoryController::class,'CreateCategoryAttribute'])->name('CreateCategoryAttribute');
    Route::PUT('SaveCategoryAttribute\{category}',[App\Http\Controllers\Admin\CategoryController::class,'SaveCategoryAttribute'])->name('SaveCategoryAttribute');
    Route::resource('Attributegroup',App\Http\Controllers\Admin\AttributegroupController::class);
    Route::resource('Attributevalue',App\Http\Controllers\Admin\AttributevalueController::class);
    Route::resource('brands',App\Http\Controllers\Admin\BrandController::class);
    Route::resource('photos',App\Http\Controllers\Admin\PhotoController::class);
    Route::resource('product',App\Http\Controllers\Admin\ProductController::class);
    Route::get('AttributValueForProduct\{product}',[App\Http\Controllers\Admin\ProductController::class,'AttributValueForProduct'])->name('AttributValueForProduct');
    Route::post('SaveAttributValueForProduct\{product}',[App\Http\Controllers\Admin\ProductController::class,'SaveAttributValueForProduct'])->name('SaveAttributValueForProduct');
    Route::resource('coupons',App\Http\Controllers\Admin\CouponController::class);
    Route::get('orders',[App\Http\Controllers\Admin\OrderController::class,'index']);
});
Route::resource('home/lo',App\Http\Controllers\Front\HomeController::class);
Route::get('/profile', function () {
    $user=auth()->user();
    $KolePoll=0;
    $KolPardakht=0;
    $Number=0;
    if(Auth::check())
    {
        $cart=auth()->user()->cart;
        foreach($cart->products as $product)
        {
            $Number+=$product->pivot->Tedad;
            if($product->discount_price)
            {
            $KolPardakht+=($product->pivot->Tedad)*($product->discount_price);
            }
            else
            {
            $KolPardakht+=($product->pivot->Tedad)*($product->price);
            }
            $KolePoll+=($product->pivot->Tedad)*($product->price);
        }
    }
    else
    {
        $Number=null;
        $cart=null;
        $KolPardakht=null;
        $KolePoll=null;
    }
    return view('front.user.profile',compact('user','cart','KolePoll','KolPardakht','Number'));
})->middleware('auth')->name('user_profile');
Route::get('/ddddddd', function () {
    auth()->logout(7);
    return redirect()->back();
});

Route::get('/', function () {
    return view('front.layout.master');
});
Route::get('/adminm', function () {
    return view('admin.layout.master');
});


Route::prefix('Cart')->middleware('auth')->group(function(){
    Route::get('/AddProduct/{product}/{user}', [App\Http\Controllers\Admin\CartController::class, 'AddProductToCart'])->name('AddProductToCart');
    Route::get('/RemoveProduct/{product}/{user}', [App\Http\Controllers\Admin\CartController::class, 'RemoveProductFromCart'])->name('RemoveProductFromCart');
    Route::get('/getcart', [App\Http\Controllers\Admin\CartController::class, 'getcart'])->name('getcart');
    Route::get('/PlusProduct/{product}/{user}', [App\Http\Controllers\Admin\CartController::class, 'PlusProduct'])->name('PlusProduct');
    Route::get('/MinusProduct/{product}/{user}', [App\Http\Controllers\Admin\CartController::class, 'MinusProduct'])->name('MinusProduct');
});
Route::post('/coupon_add',[App\Http\Controllers\Front\CouponController::class,'coupon_add'])->name('coupon_add')->middleware('auth');
Route::get('/ShowProduct/{product}',[App\Http\Controllers\Front\ProductController::class,'ShowProduct'])->name('ShowProduct');
Route::get('/compare/{product}',[App\Http\Controllers\Front\ProductController::class,'compare'])->name('compare');
Route::get('/comparewith/{product1}/{product2}',[App\Http\Controllers\Front\ProductController::class,'comparewith'])->name('comparewith');
Route::get('/category_products/{category}/{page?}',[App\Http\Controllers\Front\ProductController::class,'category_products'])->name('category_products');
Route::get('/payment_veify/{KolPardakht}',[App\Http\Controllers\Front\OrderController::class,'payment_veify'])->name('payment_veify')->middleware('auth');

Route::get('/homel', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

