<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PageController;
use App\Livewire\Shop;
use Illuminate\Support\Facades\Route;
use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Notifications\Order\OrderPlaced;
use App\Models\Order;


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

//ssp assignment
// Route::get('/',[AppController::class,'index'])->name('app.index');





//ssp lecture

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('Hello', function () {
//     return view('hello' , [
//         'name' => 'Taylor',
//         'age' => 45,
//         'address' => 'n457'
//     ]);
// });

// Route::get('ex', function () {
//     return view('example');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


//ssp lecture

Route::get('/',[PageController::class, 'showHomepage'])->name("homepage");
Route::get('shop', Shop::class)->name("shop");
Route::get('shop/{slug}', [PageController::class, "showItemDetails"])->name("item-details");
Route::get('cart', Cart::class)->name("view-cart");
Route::get('cart/checkout', Checkout::class)->name("checkout")->middleware("auth");
Route::get('thank-you', [PageController::class, "showThankyou"])->name("thank-you");
Route::get('become-a-seller', \App\Livewire\SellerOnboarding::class)->name("seller-onboarding");
//Route::get('about-us', [PageController::class, 'showAboutUsPage'])->name('aboutus');
Route::view('/about-us', 'about-us')->name('aboutus');

//Route::controller(OrderController::class)->group(function () {
//    Route::get('/orders/{id}', 'show');
//    Route::post('/orders', 'store');
//});

//Route::get('/notification', function () {
//
//    $order = Order::find(1);
//
//    return (new OrderPlaced($order->id))->toMail(auth()->user());
//});


Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [PageController::class, "showDashboard"])->name('dashboard');
});

//    Route::middleware([
//        'auth'
//    ])->resource(
//        'product-category',
//        \App\Http\Controllers\ProductCategoryController::class
//    );
//
//    Route::middleware([
//        'auth'
//    ])->resource(
//        'user',
//        \App\Http\Controllers\UserController::class
//    );

