<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




//admin related route
Route::prefix('admin')->controller(AdminController::class)->middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard','admin_index')->name('admin.dashboard');
    Route::get('/category','pro_category')->name('admin.category');
    Route::post('/add/category','insert_category')->name('add.category');
    Route::post('/update/category','update_category')->name('update.category');
    Route::post('/remove/category','delete_category')->name('delete.category');
    Route::get('/product','all_product')->name('admin.product');
    Route::post('/add/product','add_product')->name('add.product');
    Route::post('/update/product','update_product')->name('update.product');
    Route::post('/delete/product','delete_product')->name('delete.product');
    Route::get('/all/gettingOrder','get_order')->name('admin.getorder');
    Route::get('/on-way/{id}','on_way')->name('onway.status');
    Route::get('/delivered/{id}','delivered_status')->name('deliverd.status');
});


//user related route
Route::controller(UserController::class)->group(function(){
    Route::get('/','home')->name('site.home');
    Route::get('/dashboard','user_dashboard')->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/shop','shop_all')->name('site.shop');
    Route::get('/add-cart/{id}','add_cart')->middleware(['auth', 'verified'])->name('add.cart');
    Route::get('/my-cart','my_cart')->middleware(['auth', 'verified'])->name('my.cart');
    Route::get('/remove-cart/{id}','remove_cart')->middleware(['auth', 'verified'])->name('remove.cart');
    Route::get('/make-order','make_order')->middleware(['auth', 'verified'])->name('make.order');
    Route::POST('/confirm-order','confirm_order')->middleware(['auth', 'verified'])->name('confirm.order');
    Route::get('/all-orders','all_orders')->middleware(['auth', 'verified'])->name('all.orders');
    Route::get('/delivered-orders','delivered_orders')->middleware(['auth', 'verified'])->name('delivered.orders');
});