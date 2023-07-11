<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','MedicineController@getDataMedicines')->name('home');
Route::get('/obat/{id}','MedicineController@getDetailMedicines');

Route::middleware(['auth'])->group(function(){
    // Admin
    Route::get('admin','MedicineController@getData');

    // Data Obat
    Route::resource('admin/obat','MedicineController');

    // Data Kategori Obat
    Route::resource('admin/kategoriobat','CategoryController');

    // Data Pembeli
    Route::get('admin/datapembeli','TransactionController@showAllBuyer');

    // User
    Route::resource('admin/user','UserController');
    Route::post('/user/getEditForm','UserController@getEditForm')->name('user.getEditForm');
    Route::post('/user/saveData','UserController@saveData')->name('user.saveData');

    // Riwayat Pembelian
    Route::get('admin/riwayattransaksi/{id}','TransactionController@showAllBuyerTransactions');
    Route::get('admin/riwayattransaksi/detail/{id}','TransactionController@showDetailBuyerTransactions');
    
    // Report
    Route::get('admin/report','TransactionController@generateReport');

    // Edit obat tanpa reload
    Route::post('/obat/getEditForm','MedicineController@getEditForm')->name('obat.getEditForm');
    Route::post('/obat/saveData','MedicineController@saveData')->name('obat.saveData');

    // Delete  obat tanpa reload
    Route::post('/obat/deleteData','MedicineController@deleteData')->name('obat.deleteData');

    // Edit kategori tanpa reload
    Route::post('/kategoriobat/getEditForm','CategoryController@getEditForm')->name('kategoriobat.getEditForm');
    Route::post('/kategoriobat/saveData','CategoryController@saveData')->name('kategoriobat.saveData');
    
    // Delete kategori tanpa reload
    Route::post('/kategoriobat/deleteData','CategoryController@deleteData')->name('kategoriobat.deleteData');
    
    // Cart
    Route::get('cart','MedicineController@cart');
    Route::get('remove-cart-item/{id}','MedicineController@removeCartItem');

    Route::get('add-to-cart/{id}','MedicineController@addToCart');

    // Checkout
    Route::get('/checkout','TransactionController@form_submit_front');
    Route::get('/submit_checkout','TransactionController@submit_front')->name('submitcheckout');

    // Transaksi (User)
    Route::resource('/transaksi','TransactionController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/keluar', 'HomeController@getLogout')->name('keluar');
