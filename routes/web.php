<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'showproduct']);
Route::get('/detailproduct/{id}', [HomeController::class, 'showproductdetail']);
Route::get('/pembayaranproduct/{id}', [HomeController::class, 'pembayaranproduct'])->name('pembayaranproduk');
Route::post('/pembayaranproduct/insertpembayaran', [HomeController::class, 'insertpembayaran']);
Route::get('/history', [HomeController::class, 'history']);


Route::group(['middleware' => ['Auth', 'Admin']], function () {
Route::get('/admin', [ProductController::class, 'index'])->name('admin');
Route::get('/admin/add',[ProductController::class,'add']);
Route::post('/admin/insert',[ProductController::class,'insert']);
Route::get('/admin/detailproduk/{id}',[ProductController::class, 'detail']);
Route::get('/admin/edit/{id}',[ProductController::class,'edit']);
Route::post('/admin/update/{id}',[ProductController::class,'update']);
Route::get('/daftarpesanan',[ProductController::class,'pesanan']);
});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

