<?php

use App\Http\Controllers\DashboardController;
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
// --- LOGIN AREA

Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('register-eksternal', 'AuthController@registerEksternal')->name('registrasi-eksternal');


Route::middleware('auth')->group(function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard-2', 'DashboardController@index2')->name('dashboard-2');

    // --- PERMOHONAN REGISTRASI
    Route::get('/permohonan-registrasi', 'RegistrasiPemohonController@index')->name('permohonan-registrasi');
    Route::get('/permohonan-registrasi/detail/{id}', 'RegistrasiPemohonController@detail')->name('permohonan-registrasi-detail');
    Route::post('/permohonan-registrasi/tolak/{id}', 'RegistrasiPemohonController@tolak')->name('permohonan-registrasi-tolak');
    Route::post('/permohonan-registrasi/terima/{id}', 'RegistrasiPemohonController@terima')->name('permohonan-registrasi-terima');


    // --- PERMOHONAN
    Route::get('/permohonan', 'PermohonanController@index')->name('permohonan');
    Route::get('/permohonan/pertimbangan-teknis', 'PermohonanController@pertimbanganTeknis')->name('permohonan.pertimbangan-teknis');

    // -- PENGERUKAN
    Route::get('/permohonan/pertimbangan-teknis/pengerukan/{id}', 'PertekPengerukanController@show')->name('permohonan.pertimbangan-teknis.pengerukan.show');
    Route::post('/permohonan/pertimbangan-teknis/pengerukan', 'PertekPengerukanController@store')->name('permohonan.pertimbangan-teknis.pengerukan.store');

    // --- REKLAMASI
    Route::get('/permohonan/pertimbangan-teknis/reklamasi/{id}', 'PertekReklamasiController@show')->name('permohonan.pertimbangan-teknis.reklamasi.show');
    Route::post('/permohonan/pertimbangan-teknis/reklamasi', 'PertekReklamasiController@store')->name('permohonan.pertimbangan-teknis.reklamasi.store');

    // --- TERMINAL KHUSUS
    Route::get('/permohonan/pertimbangan-teknis/terminal-khusus/{id}', 'PertekTerminalKhususController@show')->name('permohonan.pertimbangan-teknis.terminal-khusus.show');
    Route::post('/permohonan/pertimbangan-teknis/terminal-khusus', 'PertekTerminalKhususController@store')->name('permohonan.pertimbangan-teknis.terminal-khusus.store');



    // --- MASTER DATA
    Route::prefix('master-data')->name('master-data.')->group(function () {
        Route::get('/', 'DataMasterController@index')->name('index');

        // ---JENIS BADAN USAHA
        Route::get('/jenis-badan-usaha', 'JenisBadanUsahaController@index')->name('jenis-badan-usaha.index');
        Route::get('/jenis-badan-usaha/add', 'JenisBadanUsahaController@create')->name('jenis-badan-usaha.create');
        Route::post('/jenis-badan-usaha', 'JenisBadanUsahaController@store')->name('jenis-badan-usaha.store');
        Route::get('/jenis-badan-usaha/{id}/edit', 'JenisBadanUsahaController@edit')->name('jenis-badan-usaha.edit');
        Route::post('/jenis-badan-usaha/{id}/update', 'JenisBadanUsahaController@update')->name('jenis-badan-usaha.update');
        Route::get('/jenis-badan-usaha/{id}/delete', 'JenisBadanUsahaController@delete')->name('jenis-badan-usaha.delete');


        // ---JENIS PENGURUS
        Route::get('/jenis-pengurus', 'JenisPengurusController@index')->name('jenis-pengurus.index');
        Route::get('/jenis-pengurus/add', 'JenisPengurusController@create')->name('jenis-pengurus.create');
        Route::post('/jenis-pengurus', 'JenisPengurusController@store')->name('jenis-pengurus.store');
        Route::get('/jenis-pengurus/{id}/edit', 'JenisPengurusController@edit')->name('jenis-pengurus.edit');
        Route::post('/jenis-pengurus/{id}/update', 'JenisPengurusController@update')->name('jenis-pengurus.update');
        Route::get('/jenis-pengurus/{id}/delete', 'JenisPengurusController@delete')->name('jenis-pengurus.delete');

        // ---KAPAL NEGARA
        Route::get('/kapal-negara', 'KapalNegaraController@index')->name('kapal-negara.index');
        Route::get('/kapal-negara/add', 'KapalNegaraController@create')->name('kapal-negara.create');
        Route::post('/kapal-negara', 'KapalNegaraController@store')->name('kapal-negara.store');
        Route::get('/kapal-negara/{id}/edit', 'KapalNegaraController@edit')->name('kapal-negara.edit');
        Route::post('/kapal-negara/{id}/update', 'KapalNegaraController@update')->name('kapal-negara.update');
        Route::get('/kapal-negara/{id}/delete', 'KapalNegaraController@delete')->name('kapal-negara.delete');


        // ---STASIUN VTS
        Route::get('/stasiun-vts', 'StasiunVtsController@index')->name('stasiun-vts.index');
        Route::get('/stasiun-vts/add', 'StasiunVtsController@create')->name('stasiun-vts.create');
        Route::post('/stasiun-vts', 'StasiunVtsController@store')->name('stasiun-vts.store');
        Route::get('/stasiun-vts/{id}/edit', 'StasiunVtsController@edit')->name('stasiun-vts.edit');
        Route::post('/stasiun-vts/{id}/update', 'StasiunVtsController@update')->name('stasiun-vts.update');
        Route::get('/stasiun-vts/{id}/delete', 'StasiunVtsController@delete')->name('stasiun-vts.delete');

        // ---STASIUN RADIO PANTAI
        Route::get('/stasiun-radio-pantai', 'StasiunRadioPantaiController@index')->name('stasiun-radio-pantai.index');
        Route::get('/stasiun-radio-pantai/add', 'StasiunRadioPantaiController@create')->name('stasiun-radio-pantai.create');
        Route::post('/stasiun-radio-pantai', 'StasiunRadioPantaiController@store')->name('stasiun-radio-pantai.store');
        Route::get('/stasiun-radio-pantai/{id}/edit', 'StasiunRadioPantaiController@edit')->name('stasiun-radio-pantai.edit');
        Route::post('/stasiun-radio-pantai/{id}/update', 'StasiunRadioPantaiController@update')->name('stasiun-radio-pantai.update');
        Route::get('/stasiun-radio-pantai/{id}/delete', 'StasiunRadioPantaiController@delete')->name('stasiun-radio-pantai.delete');


        // ---KATEGORI BARANG
        Route::get('/kategori-barang', 'KategoriBarangController@index')->name('kategori-barang.index');
        Route::get('/kategori-barang/add', 'KategoriBarangController@create')->name('kategori-barang.create');
        Route::post('/kategori-barang', 'KategoriBarangController@store')->name('kategori-barang.store');
        Route::get('/kategori-barang/{id}/edit', 'KategoriBarangController@edit')->name('kategori-barang.edit');
        Route::post('/kategori-barang/{id}/update', 'KategoriBarangController@update')->name('kategori-barang.update');
        Route::get('/kategori-barang/{id}/delete', 'KategoriBarangController@delete')->name('kategori-barang.delete');

        Route::get('/sub-kategori-barang', 'SubKategoriBarangController@index')->name('sub-kategori-barang.index');
        Route::get('/sub-kategori-barang/add', 'SubKategoriBarangController@create')->name('sub-kategori-barang.create');
        Route::get('/sub-kategori-barang', 'SubKategoriBarangController@index')->name('sub-kategori-barang.index');
        Route::post('/sub-kategori-barang', 'SubKategoriBarangController@store')->name('sub-kategori-barang.store');
        Route::get('/sub-kategori-barang/{id}/edit', 'SubKategoriBarangController@edit')->name('sub-kategori-barang.edit');
        Route::post('/sub-kategori-barang/{id}/update', 'SubKategoriBarangController@update')->name('sub-kategori-barang.update');
        Route::get('/sub-kategori-barang/{id}/delete', 'SubKategoriBarangController@delete')->name('sub-kategori-barang.delete');

        // ---SATUAN
        Route::get('/satuan', 'SatuanController@index')->name('satuan.index');
        Route::get('/satuan/add', 'SatuanController@create')->name('satuan.create');
        Route::post('/satuan', 'SatuanController@store')->name('satuan.store');
        Route::get('/satuan/{id}/edit', 'SatuanController@edit')->name('satuan.edit');
        Route::post('/satuan/{id}/update', 'SatuanController@update')->name('satuan.update');
        Route::get('/satuan/{id}/delete', 'SatuanController@delete')->name('satuan.delete');

    });


});




// PROVINCE,KABUPATEN/KOTA
Route::get('/get-regency/{id?}', 'LahanController@getRegency')->name('get-regency');
Route::get('/get-district/{id?}', 'LahanController@getDistrict')->name('get-district');


// --- ROLE SETUP
Route::get('/master-data/role', 'RoleController@index')->name('role.index');
Route::get('/master-data/role/add', 'RoleController@create')->name('role.create');
Route::post('/master-data/role', 'RoleController@store')->name('role.store');
Route::get('/master-data/role/{id}/edit', 'RoleController@edit')->name('role.edit');
Route::post('/master-data/role/{id}/update', 'RoleController@update')->name('role.update');
Route::get('/master-data/role/{id}/delete', 'RoleController@delete')->name('role.delete');

// --- USER SETUP
Route::get('/master-data/user/assign/{id}', 'UserController@asignRole')->name('user.asign');
Route::get('/master-data/user', 'UserController@index')->name('user.index');
Route::get('/master-data/user/add', 'UserController@create')->name('user.create');
Route::post('/master-data/user', 'UserController@store')->name('user.store');
Route::get('/master-data/user/{id}/edit', 'UserController@edit')->name('user.edit');
Route::get('/master-data/user/{id}/edit/profile', 'UserController@editProfile')->name('user.edit.profile');
Route::post('/master-data/user/{id}/update', 'UserController@update')->name('user.update');
Route::post('/master-data/user/{id}/update-profile', 'UserController@updateProfile')->name('user.update-profile');
Route::get('/master-data/user/{id}/delete', 'UserController@delete')->name('user.delete');

Route::get('/master-data/user/show/{id}', 'UserController@show')->name('user.show');
Route::get('/user-setting', 'UserController@userSetting')->name('user.setting');
Route::post('/user-setting', 'UserController@userSettingUpdate')->name('user.setting.update');
Route::get('/user-s', 'UserController@userSettingUpdate')->name('public-data.user');



