<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [WebsiteController::class, 'index'])->name('home');

// Product Category
Route::get('/product-category', [WebsiteController::class, 'category'])->name('product-category');
// Product detail page
Route::get('/product-detail', [WebsiteController::class, 'product'])->name('product-detail');
// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');


// Admin
//Route::get('/cart', [CartController::class, 'index'])->name('cart');
//// Checkout
//Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Category
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    // Brand
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    // Sub-Category
    Route::get('/sub-category/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('sub-category.store');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('sub-category.destroy');
    Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('sub-category.index');
    // Unit
    Route::get('/unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
    Route::get('/unit', [UnitController::class, 'index'])->name('unit.index');
    // Product
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

