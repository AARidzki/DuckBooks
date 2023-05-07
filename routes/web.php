<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardBookController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardDiscountController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DashboardFotoController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardUserController;
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

$about_me = [
    [
        'nama' => "Alfi Akbar Ridzki",
        'email' => "akbaralfi66@gmail.com",
    ],
    [
        'nama' => "Galang Yoga Pratama",
        'email' => "galang058@gmail.com",
    ],
    [
        'nama' => "Uyun Duck",
        'email' => "duck.book@gmail.com",
    ]
    ];



Route::get('/about', function () {
    // $about_me = [
    //     [
    //         'id' => '1',
    //         'nama' => "Alfi Akbar Ridzki",
    //         'email' => "akbaralfi66@gmail.com",
    //         'img' => "img/alfi.jpg"
    //     ],
    //     [
    //         'id' => '2',
    //         'nama' => "Galang Yoga Pratama",
    //         'email' => "galang058@gmail.com",
    //         'img' => "img/galang1.JPG"
    //     ],
    //     [
    //         'id' => '3',
    //         'nama' => "Uyun Duck",
    //         'email' => "duck.book@gmail.com",
    //         'img' => "img/nurul1.JPG"
    //     ]
    //     ];

    return view('about', [
        'tittle' => "About",
        'active' => 'about',
        // "abouts" => $about_me
 
        'nama' => "Alfi Akbar Ridzki",
        'email' => "akbaralfi66@gmail.com",

        'nama1' => "Galang Yoga Pratama",
        'email1' => "galang058@gmail.com",

        'nama2' => "Uyun Duck",
        'email2' => "duck.book@gmail.com",

    ]);
});

// Route::get('abouts/{id}', function($id) {
//     $about_me = [
//         [
//             'id' => '1',
//             'nama' => "Alfi Akbar Ridzki",
//             'email' => "akbaralfi66@gmail.com",
//             'img' => "img/alfi.jpg"
//         ],
//         [
//             'id' => '2',
//             'nama' => "Galang Yoga Pratama",
//             'email' => "galang058@gmail.com",
//             'img' => "img/galang1.JPG"
//         ],
//         [
//             'id' => '3',
//             'nama' => "Uyun Duck",
//             'email' => "duck.book@gmail.com",
//             'img' => "img/nurul1.JPG"
//         ]
//         ];

//         $new_about = [];
//         foreach($about_me as $about) {
//             if($about["id"] === $id)
//             $new_about = $about;
//         }

//     return view('about', [
//         "tittle" => "Single About",
//         "active" => "abouts",
//         "about" => $new_about
//     ]);
// });

Route::controller(BookController::class)->group(function() {
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{book}', [BookController::class, 'show']);
});


Route::get('categories', [CategoryController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);



Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/books', DashboardBookController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth');

Route::resource('/dashboard/discounts', DashboardDiscountController::class)->middleware('auth');

Route::post('cart', [CartController::class,'tambah'])->name('front.cart');

Route::get('/cart', [CartController::class,'listCart'])->name('front.list_cart');

Route::post('/cart/update', [CartController::class,'updateCart'])->name('front.update_cart');

Route::get('/checkout', [CartController::class,'checkout'])->middleware('auth');

Route::post('/checkout', [CartController::class,'processCheckout'])->name('front.store_checkout')->middleware('auth');

Route::get('/checkout/{invoice}', [CartController::class,'checkoutFinish'])->name('front.finish_checkout');

Route::get('/dashboard/orders', [DashboardOrderController::class,'index'])->middleware('auth');

Route::get('/dashboard/users', [DashboardUserController::class,'index'])->middleware('auth');

