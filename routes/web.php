<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardBookController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardDiscountController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DashboardFotoController;
use Illuminate\Database\Schema\IndexDefinition;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('home', [
        'tittle' => "Home",
        'active' => "home"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        'tittle' => "Home",
        'active' => "home"
    ]);
});



Route::get('/about', function () {
    return view('about', [
        'tittle' => "About",
        'active' => 'about',
        'nama' => "Uyun Duck",
        'email' => "duck.book@gmail.com",

    ]);
});

Route::get('/books', [BookController::class, 'index']);

Route::get('/books/{book}', [BookController::class, 'show']);

Route::get('categories', [CategoryController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);



Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/books', DashboardBookController::class)->middleware('auth');

Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth');

Route::resource('/dashboard/discounts', DashboardDiscountController::class)->middleware('auth');

Route::post('cart', [CartController::class,'tambah'])->name('front.cart');

Route::get('/cart', [CartController::class,'listCart'])->name('front.list_cart');