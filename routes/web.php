<?php

use App\Http\Livewire\AboutComponet;
use App\Http\Livewire\CartComponet;
use App\Http\Livewire\CheckoutComponet;
use App\Http\Livewire\ContactComponet;
use App\Http\Livewire\HomeComponat;
use App\Http\Livewire\ShopComponet;
use App\Http\Livewire\Admin\AdminDashBoardComponet;
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

// For Admin
Route::middleware(['auth:sanctum', 'verified', AuthAdmin::class])->group(function () {
    Route::get('/admin/dashboard', AdminDashBoardComponet::class)->name('admin.dashboard');
});

// For User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', UserDashBoardComponet::class)->name('user.dashboard');
});
