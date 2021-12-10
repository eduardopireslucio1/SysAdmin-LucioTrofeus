<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RelatorioController;
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
    Route::get('clientes',[ClienteController::class, 'index']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->middleware('auth');
    Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->middleware('auth');
    Route::put('/clientes/update/{id}', [ClienteController::class, 'update'])->middleware('auth');
    Route::get('/clientes/{id}',[ClienteController::class, 'show']);
    
});

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::resource('pedido', 'PedidoController');
    Route::get('pedido',[PedidoController::class, 'index']);
    // Route::post('pedido',[PedidoController::class, 'store'])->middleware('auth');
    // Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->middleware('auth');
    // Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->middleware('auth');
    // Route::put('/clientes/update/{id}', [ClienteController::class, 'update'])->middleware('auth');
    // Route::get('/clientes/{id}',[ClienteController::class, 'show']);
    
});

Route::prefix('admin')->group(function(){
    Route::resource('relatorio', 'PedidoController');
    Route::get('relatorio',[RelatorioController::class, 'index']);
    Route::get('melhoresClientes',[RelatorioController::class, 'melhoresClientes']);
    Route::get('produtosMaisVendidos',[RelatorioController::class, 'produtosMaisVendidos']);
    Route::get('faturamentoPorPeriodo',[RelatorioController::class, 'faturamentoPorPeriodo']);

});

// Route::prefix('admin')->group(function(){
//     Route::get("/produtos", [ProdutoController::class, "index"]);
//  });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
