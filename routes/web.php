<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('user.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




//admin related route
// route::get('admin/dashboard',[AdminController::class,'admin_index'])->middleware(['auth','admin']);
// route::get('/admin/dashboard/category',[AdminController::class,'pro_category']);

Route::prefix('admin')->controller(AdminController::class)->middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard','admin_index');
    Route::get('/category','pro_category')->name('admin.category');
});


//user related route
