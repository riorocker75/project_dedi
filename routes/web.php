<?php

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

/*
=========================== 
		Login
===========================
*/

Route::get('/login/tes' ,'Auth\UserController@tes');



/*
=========================== 
		Admin
===========================
*/

Route::get('/login/admin' ,'Auth\AdminLogin');
Route::post('/AdminValidate', 'Auth\AdminLogin@loginCheck');
Route::get('/logout/admin' ,'Auth\AdminLogin@logout');

// mulai dashboard admin
Route::get('/dashboard/admin', 'Admin\AdminController');

Route::get('/dashboard/admin/operator', 'Admin\OperatorCtrl@operator');
Route::get('/dashboard/admin/operator_tambah', 'Admin\OperatorCtrl@operator_tambah');
Route::post('/dashboard/admin/operator_act', 'Admin\OperatorCtrl@operator_act');
Route::get('/dashboard/admin/operator_hapus/{id}', 'Admin\OperatorCtrl@operator_hapus');
Route::get('/dashboard/admin/operator_edit/{id}','Admin\OperatorCtrl@operator_edit');
Route::post('/dashboard/admin/operator_update', 'Admin\OperatorCtrl@operator_update');
// Route::post('/dashboard/admin/operator_update', 'Admin\OperatorCtrl@operator_update');

Route::get('/dashboard/admin/anggota', 'Admin\AnggotaCtrl@anggota');
Route::get('/dashboard/admin/anggota_tabungan/{id}', 'Admin\AnggotaCtrl@anggota_tabungan');





/*
=========================== 
		Operator
===========================
*/
Route::get('/login/operator' ,'Auth\OperatorLogin');

Route::post('/OperatorValidate', 'Auth\OperatorLogin@loginCheck');
Route::get('/logout/operator' ,'Auth\OperatorLogin@logout');


/*
=========================== 
		Anggota
===========================
*/

// login 
Route::get('/login/anggota' ,'Auth\AnggotaLogin');

Route::post('/AnggotaValidate', 'Auth\AnggotaLogin@loginCheck');
Route::get('/logout/anggota' ,'Auth\AnggotaLogin@logout');

// daftar 
Route::get('/daftar/anggota' ,'Auth\AnggotaLogin@daftar');
Route::post('/daftar/anggota-act' ,'Auth\AnggotaLogin@daftar_act');

// cek validasi
Route::post('/anggota/cek_nik', 'Auth\AnggotaLogin@cek_nik');
Route::post('/anggota/cek_username', 'Auth\AnggotaLogin@cek_username');

// mulai dashboard anggota
Route::get('/dashboard/anggota', 'Anggota\AnggotaController');