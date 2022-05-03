<?php

use App\Http\Livewire\AboutComponet;
use App\Http\Livewire\Admin\AdminCategoryComponet;
use App\Http\Livewire\CartComponet;
use App\Http\Livewire\CheckoutComponet;
use App\Http\Livewire\ContactComponet;
use App\Http\Livewire\HomeComponat;
use App\Http\Livewire\ShopComponet;
use App\Http\Livewire\Admin\AdminDashBoardComponet;
use App\Http\Livewire\Admin\Category\AddCategoryComponet;
use App\Http\Livewire\Admin\Category\EditCategoryComponet;
use App\Http\Livewire\AllProductComponanet;
use App\Http\Livewire\BackSearchComponet;
use App\Http\Livewire\CateoryComponet;
use App\Http\Livewire\DetailsComponet;
use App\Http\Livewire\User\UserDashBoardComponet;
use App\Http\Middleware\AuthAdmin;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', HomeComponat::class)->name('index');
Route::get('/shop', ShopComponet::class)->name('shop');
Route::get('/cart', CartComponet::class)->name('cart');
Route::get('/checkout', CheckoutComponet::class)->name('checkout');
Route::get('/about', AboutComponet::class)->name('about');
Route::get('/contact-us', ContactComponet::class)->name('contact');
Route::get('/details/{slug}', DetailsComponet::class)->name('details');
Route::get('/cateory-products/{slug}', CateoryComponet::class)->name('cateories');
Route::get('/all-pro', AllProductComponanet::class)->name('dashboard');
Route::get('/search', BackSearchComponet::class)->name('search');

// For Admin
Route::middleware(['auth:sanctum', 'verified', AuthAdmin::class])->group(function () {
    Route::get('/admin/dashboard', AdminDashBoardComponet::class)->name('admin.dashboard');
    Route::get('/admin/cat', AdminCategoryComponet::class)->name('admin.cat');
    Route::get('/admin/cat/add', AddCategoryComponet::class)->name('admin.cat.add');
    Route::get('/admin/cat/edit/{header_slug}', EditCategoryComponet::class)->name('admin.cat.edit');
});

// For User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', UserDashBoardComponet::class)->name('user.dashboard');
});
