<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\AboutusComponent;
use App\Http\Livewire\ContactusComponent;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;

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
Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class);
Route::get('/aboutus',AboutusComponent::class);
Route::get('/contactus',ContactusComponent::class);
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');

//For Customer/user
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
       Route::get('/user/dashboard',UserDashboard::class)->name('user.dashboard');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
});

