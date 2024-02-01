<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (Request $request) {
    return view('index');
});


Route::post('/post-test', function (Request $request) {
    dd(request());
});


Route::middleware([
    'admin.auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

    Route::middleware([
        'admin.auth'
    ])->resource(
        'product-category',
        \App\Http\Controllers\ProductCategoryController::class
    );

    Route::middleware([
        'admin.auth'
    ])->resource(
        'user',
        \App\Http\Controllers\UserController::class
    );

