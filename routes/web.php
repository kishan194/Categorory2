<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\ReviewCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubcategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product/cart',function(){
    return view('product.cart');
});
Route::middleware('auth')->group(function () {
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/all-categories', [CategoryController::class, 'allCategories'])->name('categories.all');
Route::get('/categories/{category}', [CategoryController::class, 'showProducts'])->name('categories.showProducts');
Route::get('/subcategories/create', [SubcategoryController::class,'create'])->name('subcategories.create');
Route::get('/subcategories/{subcategory}', [CategoryController::class, 'showSubcategoryProducts'])->name('subcategories.showProducts');

//subCategories Route

Route::post('/subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories/{id}',[SubcategoryController::class,'view'])->name('subcategories.view');

//Product Route

Route::get('/product/create',[productcontroller::class,'create'])->name('product.create');
Route::post('/product',[productcontroller::class,'store'])->name('product.store');
Route::get('/product/{id}',[productcontroller::class,'view'])->name('product.show');
Route::get('/productdelete/{id}',[productcontroller::class,'delete'])->name('product.delete');
Route::get('/checkout',[productcontroller::class,'checkout'])->name('check.out');


});
Route::post('/add-to-cart/{id}', [productcontroller::class, 'addToCart'])->name('cart.add');
Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
Route::get('/product', [productcontroller::class, 'index'])->name('product.index');

Route::post('/remove-from-cart/{id}', [productcontroller::class, 'removeFromCart'])->name('cart.remove');
Route::get('/change-qty/{id}',[productcontroller::class,'changeQty'])->name('change_qty');


Route::get('/review-cart',[ReviewCartController::class,'index'])->name('review.cart');
Route::POST('/place/order',[ReviewCartController::class,'placeorder'])->name('place.order');
Route::get('/orderDetail',[ReviewCartController::class,'orderDetail'])->name('cart.orderDetail');
Route::get('order-view/{order_id}',[ReviewCartController::class,'OrderView'])->name('cart.orderView');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

//admin route

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';
