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
    Route::get('/permohonan/rekomendasi-teknis', 'PermohonanController@rekomendasiTeknis')->name('permohonan.rekomendasi-teknis');

        // -- PENGERUKAN
        Route::get('/permohonan/pertimbangan-teknis/pengerukan/{id}', 'PertekPengerukanController@show')->name('permohonan.pertimbangan-teknis.pengerukan.show');
        Route::post('/permohonan/pertimbangan-teknis/pengerukan', 'PertekPengerukanController@store')->name('permohonan.pertimbangan-teknis.pengerukan.store');

        // --- REKLAMASI
        Route::get('/permohonan/pertimbangan-teknis/reklamasi/{id}', 'PertekReklamasiController@show')->name('permohonan.pertimbangan-teknis.reklamasi.show');
        Route::post('/permohonan/pertimbangan-teknis/reklamasi', 'PertekReklamasiController@store')->name('permohonan.pertimbangan-teknis.reklamasi.store');

        // --- TERMINAL KHUSUS
        Route::get('/permohonan/pertimbangan-teknis/terminal-khusus/{id}', 'PertekTerminalKhususController@show')->name('permohonan.pertimbangan-teknis.terminal-khusus.show');
        Route::post('/permohonan/pertimbangan-teknis/terminal-khusus', 'PertekTerminalKhususController@store')->name('permohonan.pertimbangan-teknis.terminal-khusus.store');

        // --- TERMINAL TUKS
        Route::get('/permohonan/pertimbangan-teknis/terminal-tuks/{id}', 'PertekTerminalTuksController@show')->name('permohonan.pertimbangan-teknis.terminal-tuks.show');
        Route::post('/permohonan/pertimbangan-teknis/terminal-tuks', 'PertekTerminalTuksController@store')->name('permohonan.pertimbangan-teknis.terminal-tuks.store');

        // --- TERMINAL UMUM
        Route::get('/permohonan/pertimbangan-teknis/terminal-umum/{id}', 'PertekTerminalTumController@show')->name('permohonan.pertimbangan-teknis.terminal-umum.show');
        Route::post('/permohonan/pertimbangan-teknis/terminal-umum', 'PertekTerminalTumController@store')->name('permohonan.pertimbangan-teknis.terminal-umum.store');

        // --- PEKERJAAN BAWAH AIR
        Route::get('/permohonan/pertimbangan-teknis/pekerjaan-bawah-air/{id}', 'PertekPekerjaanBawahAirController@show')->name('permohonan.pertimbangan-teknis.pekerjaan-bawah-air.show');
        Route::post('/permohonan/pertimbangan-teknis/pekerjaan-bawah-air', 'PertekPekerjaanBawahAirController@store')->name('permohonan.pertimbangan-teknis.pekerjaan-bawah-air.store');

        // --- PEKERJAAN BAWAH AIR
        Route::get('/permohonan/pertimbangan-teknis/pembangunan-bangunan-perairan/{id}', 'PertekPembangunanBangunanPerairanController@show')->name('permohonan.pertimbangan-teknis.pembangunan-bangunan-perairan.show');
        Route::post('/permohonan/pertimbangan-teknis/pembangunan-bangunan-perairan', 'PertekPembangunanBangunanPerairanController@store')->name('permohonan.pertimbangan-teknis.pembangunan-bangunan-perairan.store');


        // --- PENYELENGGARA ALUR PELAYARAN
        Route::get('/permohonan/rekomendasi-teknis/penyelenggara-alur-pelayaran/{id}', 'RekomPenyelenggaraAlurPelayaranController@show')->name('permohonan.rekomendasi-teknis.penyelenggara-alur-pelayaran.show');
        Route::post('/permohonan/rekomendasi-teknis/penyelenggara-alur-pelayaran', 'RekomPenyelenggaraAlurPelayaranController@store')->name('permohonan.rekomendasi-teknis.penyelenggara-alur-pelayaran.store');

        // --- PEMBANGUNAN/PEMASANGAN SBNP
        Route::get('/permohonan/rekomendasi-teknis/pp-sbnp/{id}', 'RekomPpSbnpController@show')->name('permohonan.rekomendasi-teknis.pp-sbnp.show');
        Route::post('/permohonan/rekomendasi-teknis/pp-sbnp', 'RekomPpSbnpController@store')->name('permohonan.rekomendasi-teknis.pp-sbnp.store');


        // --- PEMBANGUNAN/PEMASANGAN SBNP
        Route::get('/permohonan/rekomendasi-teknis/zonasi-perairan/{id}', 'RekomZonasiPerairanController@show')->name('permohonan.rekomendasi-teknis.zonasi-perairan.show');
        Route::post('/permohonan/rekomendasi-teknis/zonasi-perairan', 'RekomZonasiPerairanController@store')->name('permohonan.rekomendasi-teknis.zonasi-perairan.store');

    // --- APPROVAL & SURVEY
    Route::get('/approval-survey', 'ApprovalSurveyController@index')->name('approval-survey');
    Route::get('/approval-survey/review/{id}', 'ApprovalSurveyController@review')->name('approval-survey.review');

    Route::post('/approval-survey/tindak-lanjut/{id}', 'ApprovalSurveyController@tindakLanjut')->name('approval-survey.tindak-lanjut');
    Route::post('/approval-survey/tindak-lanjut/disposisi/{id}', 'ApprovalSurveyController@tindakLanjutDisposisi')->name('approval-survey.tindak-lanjut.disposisi');

    Route::post('/approval-survey/tindak-lanjut/draft-rekom-pertek/{id}', 'ApprovalSurveyController@tindakLanjutDraftRekomPertek')->name('approval-survey.tindak-lanjut.draft-rekom-pertek');
    Route::post('/approval-survey/tindak-lanjut/rilis-draft-rekom-pertek/{id}', 'ApprovalSurveyController@tindakLanjutRilisDraftRekomPertek')->name('approval-survey.tindak-lanjut.rilis-draft-rekom-pertek');
    Route::post('/approval-survey/tindak-lanjut/penomoran-draft-rekom-pertek/{id}', 'ApprovalSurveyController@tindakLanjutPenomoran')->name('approval-survey.tindak-lanjut.penomoran-draft-rekom-pertek');

    // --- RAPAT INTERNAL KABAGTU LANJUTKAN INTERNAL
    Route::post('/approval-survey/tindak-lanjut/kabagtu-lanjutkan-internal/{id}', 'ApprovalSurveyController@kabagTULanjutkan')->name('approval-survey.tindak-lanjut.kabagtu-lanjutkan-internal');
    // --- RAPAT INTERNAL KABAGTU LANJUTKAN PEMOHON
    Route::post('/approval-survey/tindak-lanjut/kabagtu-lanjutkan-pemohon/{id}', 'ApprovalSurveyController@kabagTULanjutkanPemohon')->name('approval-survey.tindak-lanjut.kabagtu-lanjutkan-pemohon');

    // --- RAPAT INTERNAL CREATE UNDANGAN STAFF TU
    Route::post('/approval-survey/tindak-lanjut/stafftu-create-undangan/{id}', 'ApprovalSurveyController@staffTuCreateUndangan')->name('approval-survey.tindak-lanjut.stafftu-create-undangan');
    // --- RAPAT INTERNAL LAPORAN UNDANGAN STAFF TU
    Route::post('/approval-survey/tindak-lanjut/stafftu-laporan-undangan/{id}', 'ApprovalSurveyController@staffTuLaporanUndangan')->name('approval-survey.tindak-lanjut.stafftu-laporan-undangan');

    // --- TINDAK LANJUT REKOMENDASI KSOP
    Route::post('/tindak-lanjut/rekomendasi-ksop/{id}', 'TindakLanjutController@rekomendasiKsop')->name('approval-survey.tindak-lanjut.pemohon-rekomendasi-ksop');
    Route::post('/tindak-lanjut/pemohon-pembangunan-pelaksanaan/{id}', 'TindakLanjutController@pembangunanPelaksanaan')->name('approval-survey.tindak-lanjut.pemohon-pembangunan-pelaksanaan');
    Route::post('/tindak-lanjut/pemohon-pembangunan-penyelesaian/{id}', 'TindakLanjutController@pembangunanPenyelesaian')->name('approval-survey.tindak-lanjut.pemohon-pembangunan-penyelesaian');

    Route::post('/tindak-lanjut/tindak-lanjut-izin-kantor-pusat/{id}', 'TindakLanjutController@izinPembangunanKantorPusat')->name('approval-survey.tindak-lanjut.pemohon-izin-pembangunan-kantor-pusat');



    Route::get('/list-dokumen-rekom-pertek', 'DokumenRekomPertekController@index')->name('dokumen-rekom-pertek');
    Route::get('/tindak-lanjut-dokumen', 'ApprovalSurveyController@tindakLanjutDokumen')->name('tindak-lanjut-dokumen');

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


        // ---JENIS ZONASI PERAIRAN
        Route::get('/jenis-zonasi-perairan', 'JenisZonasiPerairanController@index')->name('jenis-zonasi-perairan.index');
        Route::get('/jenis-zonasi-perairan/add', 'jenisZonasiPerairanController@create')->name('jenis-zonasi-perairan.create');
        Route::post('/jenis-zonasi-perairan', 'jenisZonasiPerairanController@store')->name('jenis-zonasi-perairan.store');
        Route::get('/jenis-zonasi-perairan/{id}/edit', 'jenisZonasiPerairanController@edit')->name('jenis-zonasi-perairan.edit');
        Route::post('/jenis-zonasi-perairan/{id}/update', 'jenisZonasiPerairanController@update')->name('jenis-zonasi-perairan.update');
        Route::get('/jenis-zonasi-perairan/{id}/delete', 'jenisZonasiPerairanController@delete')->name('jenis-zonasi-perairan.delete');

        // ---KSOP
        Route::get('/ksop', 'KsopController@index')->name('ksop.index');
        Route::get('/ksop/add', 'KsopController@create')->name('ksop.create');
        Route::post('/ksop', 'KsopController@store')->name('ksop.store');
        Route::get('/ksop/{id}/edit', 'KsopController@edit')->name('ksop.edit');
        Route::post('/ksop/{id}/update', 'KsopController@update')->name('ksop.update');
        Route::get('/ksop/{id}/delete', 'KsopController@delete')->name('ksop.delete');


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



