<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;

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

Route::group(['middleware' => ['custom.auth']], function (){
    Route::get('/', function () {
        echo 'Hi';
    });

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('authentication.logout');
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('authentication.login');
Route::post('/login', [AuthenticationController::class, 'postLogin'])->name('authentication.post_login');
Route::get('/error', [HomeController::class, 'error'])->name('error');

