<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductBookingController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RoleController;

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

// pdf generate
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF']);

Route::get('/', [BaseController::class, 'home'])->name('home');
Route::get('home', [BaseController::class, 'home'])->name('home');
Route::get('/specialOffer', [BaseController::class, 'specialOffer'])->name('specialOffer');
Route::get('/delivery', [BaseController::class, 'delivery'])->name('delivery');
Route::get('/cart', [BaseController::class, 'cart'])->name('cart');
Route::get('/products/{id}', [BaseController::class, 'products']);
Route::get('/productView/{id}', [BaseController::class, 'productView'])->name('productView');
Route::get('/contact', [BaseController::class, 'contact'])->name('contact');
Route::get('/user/login', [BaseController::class, 'user_login'])->name('user_login');
Route::post('/user/login', [BaseController::class, 'loginCheck'])->name('loginCheck');

Route::post('/user/register', [BaseController::class, 'user_store'])->name('user_store');
Route::get('/user/logout', [BaseController::class, 'logout'])->name('user_logout');

// get category 
// Route::get('/categoryList', [BaseController::class, 'category'])->name('subcategory.show');

// Admin Login

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'makeLogin'])->name('admin.makeLogin');


// cart store

Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('cart/delete', [CartController::class, 'destroy'])->name('cart.delete');

//  Booking status

Route::post('product/booking', [ProductBookingController::class, 'store'])->name('product.booking');

// admin middleware route

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // category route
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/category/add', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/add', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/categorory/delete', [CategoryController::class, 'destroy'])->name('category.delete');

    // product create route
    Route::get('/products', [ProductController::class, 'index'])->name('product.list');
    Route::get('/product/create', [ProductController::class, 'productCreate'])->name('product.create');
    Route::post('/products/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/products/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/products/delete', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/products/details/{id}', [ProductController::class, 'productDetails'])->name('product.productDetails');
    Route::post('/products/details/{id}', [ProductController::class, 'productDetailsStore'])->name('product.productDetailsStore');

    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('admin/create/users', [UserController::class, 'store'])->name('admin.create');
    Route::post('admin/create/users', [UserController::class, 'create'])->name('admin.create.user');
    Route::post('admin/delete', [UserController::class, 'delete'])->name('user.delete');

    // Create role
    Route::get('admin/role', [RoleController::class, 'index'])->name('admin.roles');
    Route::get('admin/create/role', [RoleController::class, 'store'])->name('admin.role');
    Route::post('admin/create/role', [RoleController::class, 'create'])->name('admin.create.role');
});