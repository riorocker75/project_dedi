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

Route::get('/','Front\FrontCtrl');
Route::get('/simulasi','Front\FrontCtrl@simulasi');


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

// pengaturan simpanan
Route::get('/dashboard/admin/atur_simpanan', 'Admin\SimpananCtrl');
//--pengaturan simpanan umum
Route::get('/admin/pengaturan/simpanan-umum', 'Admin\SimpananCtrl@atur_umum');
Route::post('/admin/pengaturan/simpanan-umum/update', 'Admin\SimpananCtrl@atur_umum_update');

//--pengaturan simpanan deposit
Route::get('/admin/pengaturan/simpanan-deposit', 'Admin\SimpananCtrl@atur_deposit');

//--pengaturan simpanan lain(umroh dan pendidikan)
Route::get('/admin/pengaturan/simpanan-lain', 'Admin\SimpananCtrl@atur_lain');



// kategori pinjaman
Route::get('/dashboard/admin/kategori_pinjaman', 'Admin\KategoriCtrl@kategori_pinjaman');
Route::post('/dashboard/admin/kategori_pinjaman_act', 'Admin\KategoriCtrl@kategori_pinjaman_act');
Route::get('/dashboard/admin/kategori_pinjaman_hapus/{id}', 'Admin\KategoriCtrl@kategori_pinjaman_hapus');
Route::post('/dashboard/admin/kategori_pinjaman_update', 'Admin\KategoriCtrl@kategori_pinjaman_update');

// permohonan peminjam
Route::get('/admin/permohonan-pinjam','Admin\PinjamanCtrl@permohonan_pinjam');
Route::get('/admin/cek-mohon/{id}','Admin\PinjamanCtrl@cek_mohon');
Route::post('/admin/review-act/{id}','Admin\PinjamanCtrl@review_pinjaman_act');


// data pekerjaan
Route::get('/admin/pekerjaan', 'Admin\PekerjaanCtrl');
Route::post('/admin/pekerjaan/tambah-act', 'Admin\PekerjaanCtrl@tambah_act');
Route::get('/admin/pekerjaan/delete-act/{id}', 'Admin\PekerjaanCtrl@tambah_delete');

// data pengajuan
//---anggota gabung
Route::get('/admin/mohon-gabung','Admin\PengajuanCtrl@anggota_gabung');
Route::get('/admin/detail/anggota-mohon/{id}','Admin\PengajuanCtrl@detail_gabung');

//---pinjaman
Route::get('/admin/data-pinjaman','Admin\PengajuanCtrl@data_peminjam');

Route::get('/admin/review-pinjaman/{id}','Admin\PengajuanCtrl@data_peminjam_detail');

//---simpanan
Route::get('/admin/pemohon/simpanan','Admin\PengajuanCtrl@mohon_simpanan');


// Bagian Transaksi
Route::get('/admin/transaksi/simpanan','Admin\TransaksiCtrl@transaksi_simpanan');
Route::get('/admin/transaksi/pinjaman','Admin\TransaksiCtrl@transaksi_pinjaman');

// simpanan umum
Route::get('/admin/transaksi/simpanan-umum','Admin\TransaksiCtrl@transaksi_simpanan_umum');

// simpanan berjangka
Route::get('/admin/transaksi/simpanan-berjangka','Admin\TransaksiCtrl@transaksi_deposito');

// simpanan umroh
Route::get('/admin/transaksi/simpanan-umroh','Admin\TransaksiCtrl@transaksi_umroh');

// simpanan pendidikan
Route::get('/admin/transaksi/simpanan-pendidikan','Admin\TransaksiCtrl@transaksi_pendidikan');

// bagian pembayaran
Route::get('/admin/pembayaran/pinjaman','Admin\PembayaranCtrl@bayar_pinjaman');
Route::get('/admin/pembayaran/pinjaman/detail/{id}','Admin\PembayaranCtrl@detail_bayar_pinjaman');
Route::post('/admin/pembayaran/pinjaman/bayar','Admin\PembayaranCtrl@bayar_pinjaman_act');


// laporan
//-- laporan shu
Route::get('/admin/laporan/shu','Admin\LaporanCtrl@laporan_shu');


/*
=========================== 
		Operator
===========================
*/
Route::get('/login/operator' ,'Auth\OperatorLogin');

Route::post('/OperatorValidate', 'Auth\OperatorLogin@loginCheck');
Route::get('/logout/operator' ,'Auth\OperatorLogin@logout');

// mulai dashboard operator
Route::get('/dashboard/operator' ,'Operator\OperatorController');

// data pribadi 
Route::get('/operator/data-pribadi/{id}','Operator\OperatorController@data_pribadi');
Route::post('/operator/data-pribadi-update/{id}','Operator\OperatorController@data_pribadi_update');

// masalah approve anggota baru
Route::get('/operator/mohon-gabung','Operator\AnggotaGabung');
Route::get('/operator/detail/anggota-mohon/{id}','Operator\AnggotaGabung@detail_pemohon');
Route::post('/operator/gabung-act/{id}','Operator\AnggotaGabung@gabung_act');


// masalah peminjaman
Route::get('/operator/data-pinjaman','Operator\OperatorController@data_peminjam');
Route::get('/operator/review-pinjaman/{id}','Operator\OperatorController@review_peminjam');
Route::post('/operator/review-act/{id}','Operator\OperatorController@review_pinjaman_act');

// masalah simpanan
Route::get('/operator/data-simpanan','Operator\AnggotaSimpanan');
Route::get('/operator/detail/mohon-simpanan/{id}','Operator\AnggotaSimpanan@detail_pemohon');
Route::post('/operator/mohon-simpanan/act{id}','Operator\AnggotaSimpanan@mohon_act');
Route::get('/operator/tambah/mohon-simpanan','Operator\AnggotaSimpanan@tambah_mohon');

// approve pengaju simpanan
Route::get('/operator/tambah/mohon/simpanan-umum', 'Operator\AnggotaSimpanan@aju_sim_umum');
Route::get('/operator/tambah/mohon/simpanan-deposit', 'Operator\AnggotaSimpanan@aju_sim_deposit');
Route::get('/operator/tambah/mohon/simpanan-umroh', 'Operator\AnggotaSimpanan@aju_sim_umroh');
Route::get('/operator/tambah/mohon/simpanan-pendidikan', 'Operator\AnggotaSimpanan@aju_sim_pendidikan');





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


// data pribadi anggota
Route::get('/anggota/data-pribadi/{id}', 'Anggota\AnggotaController@data_pribadi');
Route::post('/anggota/data-pribadi-update/{id}', 'Anggota\AnggotaController@data_pribadi_update');

//ajukan pinjaman anggota
Route::get('/anggota/data-pinjaman/{id}' , 'Anggota\AnggotaController@data_pinjam');
Route::get('/anggota/ajukan-pinjaman' , 'Anggota\AnggotaController@aju_pinjam');
Route::post('/anggota/ajukan-pact' , 'Anggota\AnggotaController@aju_pinjam_act');
Route::get('/anggota/view-pinjaman/{id}', 'Anggota\AnggotaController@view_pinjaman');

Route::post('/anggota/cek-angsur','Anggota\AnggotaController@cek_angsuran');
Route::post('/anggota/cek-angsur-fix','Anggota\AnggotaController@cek_angsuran_fix');

// detail pinjaman
Route::get('/anggota/detail-pinjaman/{id}', 'Anggota\Ang_PinjamanCtrl@simulasi_bayar');


// bagian ajukan simpanan
Route::get('/anggota/aju-simpanan','Anggota\Ang_SimpananCtrl');

Route::get('/anggota/ajukan/simpanan-umum','Anggota\Ang_SimpananCtrl@aju_simpanan_umum');
Route::get('/anggota/ajukan/simpanan-deposit','Anggota\Ang_SimpananCtrl@aju_simpanan_deposit');
Route::get('/anggota/ajukan/simpanan-umroh','Anggota\Ang_SimpananCtrl@aju_simpanan_umroh');
Route::get('/anggota/ajukan/simpanan-pendidikan','Anggota\Ang_SimpananCtrl@aju_simpanan_pendidikan');

// bagian transaksi
Route::get('/anggota/riwayat/transaksi/','Anggota\Ang_Transaksi@histori_simpanan');

