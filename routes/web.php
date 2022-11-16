<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::resource('/categorias',App\Http\Controllers\CategoriaController::class);
Route::resource('/productos',App\Http\Controllers\ProductoController::class);
Route::resource('/facturation',App\Http\Controllers\FacturaController::class);



Route::post('/facturation/add/product', [App\Http\Controllers\FacturacionController::class, 'addProductToVent'])->name('addProduct');
Route::get('/facturation/get/product', [App\Http\Controllers\FacturacionController::class, 'index'])->name('getAddProduct');

Route::delete('/facturation/cancel/vent', [App\Http\Controllers\FacturacionController::class, 'cancelVent'])->name('cancelVent');
Route::delete('/facturation/product/delete', [App\Http\Controllers\FacturacionController::class, 'deleteProductToVent'])->name('deleteProductToVent');
Route::get('/factura', [App\Http\Controllers\FacturacionController::class, 'view'])->name('factura');
Route::get('/factura/generateReport', [App\Http\Controllers\FacturaController::class, 'generateReport'])->name('generateReport');
