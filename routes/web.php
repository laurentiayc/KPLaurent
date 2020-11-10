<?php

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
// BKCU
$appRoutes = function() {
	// home
	Route::get('/',array( 'as' => 'home','uses' => 'PublicController@index'));

	// tentang kami
	Route::get('/tentang_kami/profile',array( 'as' => 'profile','uses' => 'PublicController@profile'));

	// artikel
	Route::get('/artikel',array( 'as' => 'artikel','uses' => 'PublicController@artikel'));
	Route::get('/artikel/cari',array( 'as' => 'artikel.cari','uses' => 'PublicController@artikelCari'));
	Route::get('/artikel/lihat/{slug}',array( 'as' => 'artikel.lihat','uses' => 'PublicController@artikelLihat'));
	Route::get('/artikel/kategori/{slug}',array( 'as' => 'artikel.kategori','uses' => 'PublicController@artikelKategori'));
    Route::get('/artikel/penulis/{slug}',array( 'as' => 'artikel.penulis','uses' => 'PublicController@artikelPenulis'));
    
	// cu
	Route::get('/cu',array( 'as' => 'cu','uses' => 'PublicController@cu'));

	// kegiatan
	Route::get('/kegiatan/diklat/{periode}',array( 'as' => 'diklat','uses' => 'PublicController@diklat'));
	Route::get('/kegiatan/diklat/lihat/{slug}',array( 'as' => 'diklat.lihat','uses' => 'PublicController@diklatLihat'));
	
	// dokumen
	Route::get('dokumen',array('as' => 'dokumen','uses' => 'PublicController@dokumen'));
	Route::get('download/{filename}',array('as' => 'file','uses' => 'PublicController@download_file'));

	// panduan
	Route::get('panduan',array( 'as' => 'panduan','uses' => 'PublicController@panduan'));
};

Route::group(array('domain' => 'bkcuvue.test'), $appRoutes);

// cu
$appSubRoutes = function() {
	// home
	Route::get('/',array( 'as' => 'home.cu','uses' => 'PublicCuController@index'));

	// artikel
	Route::get('/artikel',array( 'as' => 'artikel.cu','uses' => 'PublicCuController@artikel'));
	Route::get('/artikel/cari',array( 'as' => 'artikel.cari.cu','uses' => 'PublicCuController@artikelCari'));
	Route::get('/artikel/lihat/{slug}',array( 'as' => 'artikel.lihat.cu','uses' => 'PublicCuController@artikelLihat'));
	Route::get('/artikel/kategori/{slug}',array( 'as' => 'artikel.kategori.cu','uses' => 'PublicCuController@artikelKategori'));
	Route::get('/artikel/penulis/{slug}',array( 'as' => 'artikel.penulis.cu','uses' => 'PublicCuController@artikelPenulis'));
	// tp
	Route::get('/tp',array( 'as' => 'tp','uses' => 'PublicCuController@tp'));

	// produk
	Route::get('/produk',array( 'as' => 'produk','uses' => 'PublicCuController@produk'));

	//login
	Route::get('/login',array('as' => 'login', 'uses' => 'AuthCu\LoginController@login'));
	
	//dashboardCu
	Route::post('/dashboardCu',array('as' => 'dashboardCu', 'uses' => 'AuthCu\LoginController@validationRequest'));
	//
	
	Route::group(['middleware' => 'DashboardCuAuthenticate'], function(){
		Route::get('/updatePassword',array('as' => 'updatePassword', 'uses' => 'AuthCu\LoginController@updatePassword'));
		Route::post('/updatePasswordSuccess',array('as' => 'updatePasswordSuccess', 'uses' => 'AuthCu\LoginController@updatePasswordSuccess'));

		Route::get('/dashboardCu',array('as' => 'dashboardCu', 'uses' => 'AuthCu\LoginController@dashboardCu'));

		//success
		Route::get('/loginSuccess',array('as' => 'loginSuccess', 'uses' => 'AuthCu\LoginController@success'));

		//profile Anggota
		Route::get('/profileAnggota',array('as' => 'profileAnggota', 'uses' => 'DataAnggota\ProfileAnggotaController@profileAnggota'));
		Route::post('/updateProfile',array('as' => 'updateProfile', 'uses' => 'DataAnggota\ProfileAnggotaController@editProfile'));
		// Route::get('/profileAnggota',array('as' => 'profileAnggota', 'uses' => 'DataAnggota\ProfileAnggotaController@editProfile'));

		//pinjaman Anggota
		Route::get('/pinjamanAnggota',array('as' => 'pinjamanAnggota', 'uses' => 'DataAnggota\PinjamanAnggotaController@pinjamanAnggota'));
		Route::post('/createPinjaman',array('as' => 'createPinjaman', 'uses' => 'DataAnggota\PinjamanAnggotaController@createPinjaman'));
		
		//logout
		Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthCu\LoginController@logout'));
	});
};

Route::group(array('domain' => '{cu}.bkcuvue.test'), $appSubRoutes);

// admins
Route::get('/admins/{vue?}','PublicController@admins')->where('vue', '^(?!.*api).*$[\/\w\.-]*');

// test route
Route::get('/testroute','PublicController@testroute');