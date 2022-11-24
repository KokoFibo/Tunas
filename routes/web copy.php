<?php


use App\Http\Livewire\Notas;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Customer;
use App\Http\Livewire\Customers;
use App\Http\Livewire\Suratjalans;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\infoController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\titleController;
use App\Http\Controllers\gajianController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\notapondController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\hargapondController;
use App\Http\Controllers\suratjalanController;
use App\Http\Controllers\notaponditemController;
use App\Http\Controllers\suratjalanitemController;
use App\Http\Controllers\OrderSuratJalanController;
use App\Http\Controllers\sjorderController;

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
 
Route::get('/customer', [customerController::class, 'index']);
Route::get('/customer/create', [customerController::class, 'create']);
Route::get('/customer/store', [customerController::class, 'store']);
Route::get('/customer/edit/{id}', [customerController::class, 'edit']);
Route::get('/customer/update/{id}', [customerController::class, 'update']);
Route::get('/customer/destroy/{id}', [customerController::class, 'destroy']);
Route::get('/customer/fetch_data', [customerController::class, 'fetch_data']);
Route::get('/customer/read', [customerController::class, 'read']);
Route::get('/customer/show/{id}', [customerController::class, 'show']);

Route::get('/covid', [infoController::class, 'info']);

Route::get('/pesanan/main', [pesananController::class, 'index']);
Route::get('/pesanan/create', [pesananController::class, 'create']);
Route::post('/pesanan/store', [pesananController::class, 'store']);
Route::get('/pesanan/{id}/edit', [pesananController::class, 'edit']);
Route::put('/pesanan/{id}', [pesananController::class, 'update']);
Route::delete('/pesanan/{id}', [pesananController::class, 'destroy']);

Route::get('/title/main', [titleController::class, 'index']);
Route::post('/title/store', [titleController::class, 'store']);
Route::delete('/title/{id}', [titleController::class, 'destroy']);
Route::get('/title/{id}/default', [titleController::class, 'default']);

Route::get('/notapond/main', [notapondController::class, 'index']);
Route::get('/notapond/search', [notapondController::class, 'search'])->name('searchNotaPond');

Route::post('/notapond/store', [notapondController::class, 'store']);

Route::get('/notapond/read', [notapondController::class, 'read']);
Route::get('/notapond/createnota', [notapondController::class, 'createNota']);
Route::get('/notapond/create', [notapondController::class, 'create']);
Route::get('/notapond/show/{id}', [notapondController::class, 'show']);
Route::get('/notapond/delete/{id}', [notapondController::class, 'delete']);
Route::get('/notapond/edit/{id}', [notapondController::class, 'edit']);
Route::get('/notapond/destroy/{id}', [notapondController::class, 'destroy']);
Route::get('/notapond/edititem/{id}', [notapondController::class, 'edititem']);
Route::post('/notapond/itemupdate/{id}', [notapondController::class, 'itemupdate']);

Route::get('/nota', Notas::class);




Route::get('/notaponditem/read', [notaponditemController::class, 'read']);

Route::get('/notaponditem/main', [notaponditemController::class, 'index']);
Route::post('/notaponditem/store', [notaponditemController::class, 'store']);
Route::get('/notaponditem/destroy/{id}', [notaponditemController::class, 'destroy']);


Route::get('/hargapond/main', [hargapondController::class, 'index']);
Route::post('/hargapond/store', [hargapondController::class, 'store']);
Route::delete('/hargapond/{id}', [hargapondController::class, 'destroy']);

Route::get('/karyawan', [karyawanController::class, 'index']);
Route::get('/karyawan/read', [karyawanController::class, 'read']);
Route::get('/karyawan/create', [karyawanController::class, 'create']);
Route::get('/karyawan/store', [karyawanController::class, 'store']);
Route::get('/karyawan/destroy/{id}', [karyawanController::class, 'destroy']);
Route::get('/karyawan/show/{id}', [karyawanController::class, 'show']);
Route::get('/karyawan/update/{id}', [karyawanController::class, 'update']);
Route::get('/karyawan/absensi', [karyawanController::class, 'absensi']);
Route::get('/karyawan/download-pdf', [karyawanController::class, 'downloadPDF']);




Route::get('/gajian', [gajianController::class, 'index']);
Route::get('/gajian/read', [gajianController::class, 'read']);
Route::get('/gajian/store', [gajianController::class, 'store']);
Route::get('/gajian/destroy/{id}', [gajianController::class, 'destroy']);
Route::get('/gajian/show/{id}', [gajianController::class, 'show']);
Route::get('/gajian/update/{id}', [gajianController::class, 'update']);

Route::get('/order', [orderController::class, 'index']);
Route::get('/order/read', [orderController::class, 'read']);
Route::get('/order/store', [orderController::class, 'store']);
Route::get('/order/create', [orderController::class, 'create']);
Route::get('/order/destroy/{id}', [orderController::class, 'destroy']);
Route::get('/order/edit/{id}', [orderController::class, 'edit']);
Route::get('/order/update/{id}', [orderController::class, 'update']);
Route::get('/order/show/{id}', [orderController::class, 'show']);
Route::get('/order/done/{id}', [orderController::class, 'done']);

// Route::get('/suratjalan', [suratjalanController::class, 'index']);
// Route::post('/suratjalan/store', [suratjalanController::class, 'store']);

Route::get('/suratjalan', Suratjalans::class);

Route::get('/cust', Customers::class);

Route::get('/suratjalanorder', [sjorderController::class, 'index']);
Route::get('/suratjalanorder/create', [sjorderController::class, 'create']);
Route::post('/suratjalanorder/save', [sjorderController::class, 'save']);
Route::post('/suratjalanorder/getnamabarang', [sjorderController::class, 'getnamabarang'])->name('getnamabarang');
Route::get('/suratjalanorder/search', [sjorderController::class, 'search'])->name('search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// dibawh ini tidak di pindah
Route::get('/', [dashboardController::class, 'index']);

// Route::get('/testaja', function () {

//     $pdf = PDF::loadView('karyawan.absensi');

//     // return $pdf->download();
//     return $pdf->stream();
// });


// Route::get('/', function () {
//     return view('dashboard',  [
//         "title" => "Dashboard"
//     ]);
// });




Route::middleware(['auth'])->group(function () {

    //masukkan semua routes disini spy gak bisa diakses tanpa login


});
Auth::routes();
