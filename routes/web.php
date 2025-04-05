<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('layouts.app');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/change/password', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('change.password')->middleware('verified');
Route::post('/change/password/page', [App\Http\Controllers\HomeController::class, 'changepasswordpage'])->name('change.password.page')->middleware('verified');


Route::middleware(['auth'])->group(function () {
    Route::get('/category/list', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/add', [CategoryController::class, 'addcategory'])->name('add.category');
    Route::get('/category/addsub', [CategoryController::class, 'addsubcategory'])->name('add.subcategory');
    Route::get('/category/addfunction', [CategoryController::class, 'addfunction'])->name('add.function');
    Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category.store');
    Route::get('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::post('/category/update/{id}', [CategoryController::class, 'updateCategorystore'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
})->middleware('verified');
