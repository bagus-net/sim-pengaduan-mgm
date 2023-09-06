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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('masyarakat');
Route::resource('home','HomeController')->middleware('masyarakat');

Route::get('home/{id}/show/', 'HomeController@showing')->name('home.showing');
Route::post('/','HomeController@komentar')->name('home.komentar');
Route::get('login-user', function () {
    return view('login/index');
});

Route::get('daftar-login', function () {
    return view('login/daftar');
});

Route::post('login-user','Auth\LoginController@login')->name('loginpost');
Route::post('daftar-login','Auth\RegisterController@showRegistrationForm')->name('register-create');




// HOMEE
Route::get('/', 'IndexController@index')->name('index');
// ABOUT
Route::get('about', 'IndexController@about')->name('about');
// PENGADUAN
Route::resource('pengaduan','MasyarakatPengaduanController')->middleware('masyarakat');
Route::get('pengaduan/{id}/edit/', 'MasyarakatPengaduanController@showing')->name('masyarakat-pengaduan.showing')->middleware('masyarakat');

Route::post('pengaduan/{id}/edit','MasyarakatPengaduanController@update')->name('editeyy')->middleware('masyarakat');

Route::post('pengaduan','MasyarakatPengaduanController@store')->name('masyarakat-store')->middleware('masyarakat');

// PROFILE
Route::resource('profile','ProfileController')->middleware('masyarakat');
Route::post('profile/{id}/delete','MasyarakatPengaduanController@delete')->name('masyarakat-destroy')->middleware('masyarakat');


// INI MIDDLEWARE ADMIN
// DASHBOARD ADMIN
Route::resource('admin/dashboard','AdminController')->middleware('admin');
Route::get('admin/dashboard', 'AdminController@index')->name('admin/dashboard')->middleware('admin');
// PENGADUAN - TANGGAPAN
Route::resource('admin/pengaduan','TanggapanController')->middleware('admin');
Route::post('admin/pengaduan/{id}/show/', 'TanggapanController@updateyeh')->name('tanggapan-update')->middleware('admin');
Route::get('admin/pengaduan/{id}/show/', 'TanggapanController@showing')->name('tanggapan.showing')->middleware('admin');
Route::get('admin/pengaduan/cari','TanggapanController@cari')->name('cari-pengaduan')->middleware('admin');
// KOMENTAR
Route::resource('admin/komentar','KomentarController')->middleware('admin');
// PENGUMUMAN
Route::resource('admin/pengumuman', 'PengumumanController')->middleware('admin');
Route::get('admin/pengumuman/{id}/show/', 'PengumumanController@showing')->name('pengumuman.showing')->middleware('admin');
// USERRR
Route::resource('admin/user', 'UserController')->middleware('admin');
Route::get('admin/user/{id}/profile', 'UserController@showing')->name('user.showing')->middleware('admin');
Route::get('admin/user/create', 'UserController@create')->name('tambah-user')->middleware('admin');
Route::post('admin/user/create', 'UserController@store')->name('create-user')->middleware('admin');



// MASYARAKAT
Route::resource('admin/masyarakat', 'MasyarakatController')->middleware('admin');
Route::get('admin/masyarakat/{id}/show', 'MasyarakatController@showing')->name('masyarakat.showing')->middleware('admin');
Route::get('admin/masyarakat/{id}/ubah-masyarakat', 'MasyarakatController@profile')->name('masyarakat.edit')->middleware('admin');
Route::post('admin/masyarakat/{id}/ubah-masyarakat', 'UserController@updatedong')->name('masyarakat-update')->middleware('admin');

// PDF LAPOPORAN CEKTAK
Route::resource('admin/laporan', 'LaporanController')->middleware('admin');
Route::get('pengaduan_pdf/cetak_pdf', 'LaporanController@cetak_pdf')->name('cetak-laporan');



// // INI MIDDLEWARE PETUGAS
// // DASHBOARD
Route::get('petugas/dashboard', 'PetugasController@index')->name('petugas/dashboard')->middleware('petugas');
// // PENGUMUMAN
Route::get('petugas/pengumuman', 'PetugasPengumumanController@index')->middleware('petugas');
Route::get('petugas/pengumuman/{id}/show', 'PetugasPengumumanController@showing')->name('petuags-pengumuman.showing')->middleware('petugas');
// // USER
Route::post('petugas/{id}/profile','UserController@heyupdate')->name('update-ptgs')->middleware('petugas');
Route::get('petugas/user/{id}/profile', 'PetugasUserController@showing')->name('petugas-user.showing')->middleware('petugas');
Route::get('petugas/user/{id}/show', 'PetugasUserController@show')->name('petugas-user.show')->middleware('petugas');
// // PENGADUAN - TANGGAPAN
Route::get('petugas/pengaduan', 'PetugasPengaduanController@index')->middleware('petugas');
Route::get('petugas/pengaduan/{id}/show/', 'PetugasPengaduanController@showing')->name('petugas-tanggapan.showing')->middleware('petugas');
Route::post('petugas/pengaduan/{id}','PetugasPengaduanController@delete')->name('pengaduan-petugas.delete')->middleware('petugas');
Route::post('petugas/pengaduan/{id}/show','PetugasPengaduanController@update')->name('pengaduan-petugas.update')->middleware('petugas');

// // KOMENTAR
Route::get('petugas/komentar', 'PetugasKomentarController@index')->middleware('petugas');
Route::post('petugas/komentar/{id}','PetugasKomentarController@delete')->name('komentar-petugas')->middleware('petugas');
