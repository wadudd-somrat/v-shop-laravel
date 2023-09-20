<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
});
Route::group(['prefix'=>'menus','as'=>'menus'],function() {
    Route::get('/',[MenuController::class,'index']);
    Route::post('/', [MenuController::class,'store'])->name('.store');
    Route::get('/create',[MenuController::class,'create'])->name('.create');
    Route::get('/sub-menu/{id}',[MenuController::class,'getSubMenu'])->name('.childes');
    Route::get('/edit/{id}',[MenuController::class,'edit'])->name('.edit');
});

Route::group(['prefix'=>'products','as'=>'products'],function() {
    Route::get('/',[ProductController::class,'index']);
    Route::post('/', [ProductController::class,'store'])->name('.store');
    Route::get('/create',[ProductController::class,'create'])->name('.create');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('.edit');
});

