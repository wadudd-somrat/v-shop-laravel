<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/shop',[HomeController::class,'getAllProduct']);

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    });
    Route::group(['prefix' => 'menus', 'as' => 'menus'], function () {
        Route::get('/', [MenuController::class, 'index']);
        Route::post('/', [MenuController::class, 'store'])->name('.store');
        Route::get('/create', [MenuController::class, 'create'])->name('.create');
        Route::get('/sub-menu/{id}', [MenuController::class, 'getSubMenu'])->name('.childes');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('.update');
    });

    Route::group(['prefix' => 'products', 'as' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('/', [ProductController::class, 'store'])->name('.store');
        Route::get('/create', [ProductController::class, 'create'])->name('.create');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('.update');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('.show');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('.delete');
    });
});

