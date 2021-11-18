<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::resource('produtos', 'ProdutoController');
    Route::get('produtos',[ProdutoController::class, 'index']);
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');
    Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
    Route::put('/produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');
    Route::get('/produtos/{id}',[ProdutoController::class, 'show']);
    
});

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::resource('clientes', 'ClienteController');
    // Route::get('clientes',[ClienteController::class, 'index']);
    // Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');
    // Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
    // Route::put('/produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');
    // Route::get('/produtos/{id}',[ProdutoController::class, 'show']);
    
});

// Route::prefix('admin')->group(function(){
//     Route::get("/produtos", [ProdutoController::class, "index"]);
//  });