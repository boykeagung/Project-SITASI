<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BimbinganKPController;
use App\Http\Controllers\BimbinganTAController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DospemBimbinganKPController;
use App\Http\Controllers\DospemBimbinganTAController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\TAController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\KoordinatorTAController;
use App\Http\Controllers\KoordinatorProposalController;
use App\Http\Controllers\KoordinatorSeminarController;
use App\Http\Controllers\DospemProposalController;
use App\Http\Controllers\DospengProposalController;
use App\Http\Controllers\TUProposalSeminarSidangController;
use App\Http\Controllers\DospemSeminarController;
use App\Http\Controllers\DospemSidangKPController;
use App\Http\Controllers\DospengSeminarController;
use App\Http\Controllers\DospengSidangKPController;
use App\Http\Controllers\KoordinatorKPController;
use App\Http\Controllers\KoordinatorKPForm001Controller;
use App\Http\Controllers\KoordinatorSidangKPController;
use App\Http\Controllers\KPController;
use App\Http\Controllers\SidangKPController;
use App\Http\Controllers\Form001Controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\KoordinatorBimbinganTA;
use App\Http\Controllers\TUForm001Controller;
use App\Http\Controllers\testForm001Controller;
use App\Http\Controllers\MahasiswaYudisiumController;
use App\Http\Controllers\YudisiumController;
use App\Http\Controllers\DospemNilaiKPController;
use App\Http\Controllers\NilaiDosPemController;
use App\Http\Controllers\NilaiKoordinatorKPController;
use App\Http\Controllers\NilaiSidangKPController;
use App\Http\Controllers\Dosen_Residensi;
use App\Http\Controllers\NilaiDosPemPerusahaanController;
use App\Models\Bimbingan_kp;
use App\Http\Controllers\ProfileController;
use App\Models\bimbingan_ta;
use App\Http\Controllers\DospemYudisiumController;
use App\Http\Controllers\DospengYudisiumController;
use App\Http\Controllers\KoordinatorBimbinganKP;
use App\Http\Controllers\KoordinatorResidensi;
use App\Http\Controllers\KoordinatorSidangTAController;
use App\Http\Controllers\MahasiswaSidangTAController;
use App\Http\Controllers\DospengSidangTAController;
use App\Http\Controllers\DospemSidangTAController;
use App\Http\Controllers\Mahasiswa_Residensi_Controller;
use App\Models\Mahasiswa;
use App\Models\Proposal;
use App\Models\TA;
use App\Models\Form001;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\UploadedFile;

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

// Route::group(['middleware' => ['auth']], function () {
Route::get('/', function () {
    return view('index');
})->name('home');
// });


Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
});


// Route Beta
// Route::get('/bimbingan', function () {
//     return view('mahasiswa/dashboard-mahasiswa-bimbingan-ta');
// });
// Route::get('/tambah_bimbingan', function () {
//     return view('mahasiswa/dashboard-mahasiswa-tambah-bimbingan-ta');
// });

// Route::get('/pembimbing_bimbingan', function () {
//     return view('dosen_pembimbing_penguji/dashboard-dospem-bimbingan-ta');
// });


// Route::get('/login', 'AuthController@getLogin');
// Route::post('/login', 'AuthController@postLogin');

// Login mahasiswa
Route::get('/login-mahasiswa', [AuthController::class, 'LoginMahasiswa'])->middleware('guest');
Route::post('/post-login-mahasiswa', [AuthController::class, 'PostLoginMahasiswa']);
// login koordinator ta
Route::get('/login-koordinator', [AuthController::class, 'Loginkoordinator'])->middleware('guest');
Route::post('/post-login-koordinator', [AuthController::class, 'PostLoginKoordinator']);
// login koordinator kp
Route::get('/login-koordinator-kp', [AuthController::class, 'LoginkoordinatorKP'])->middleware('guest');
Route::post('/post-login-koordinator-kp', [AuthController::class, 'PostLoginKoordinatorKP']);
// login koordinator yudisium
Route::get('/login-koordinator-yudisium', [AuthController::class, 'LoginKoordinatorYudisium'])->middleware('guest');
Route::post('/post-login-koordinator-yudisium', [AuthController::class, 'PostLoginKoordinatorYudisium']);
// dosen
Route::get('/login-dosen', [AuthController::class, 'LoginDosen'])->middleware('guest');
Route::post('/post-login-dosen', [AuthController::class, 'PostLoginDosen']);
// Login TU
Route::get('/login-tu', [AuthController::class, 'LoginTU'])->middleware('guest');
Route::post('/post-login-tu', [AuthController::class, 'PostLoginTU']);
// Logout
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('notifikasi', [NotificationController::class, 'index']);
Route::post('/readNotification', [NotificationController::class, 'readNotification']);
Route::get('/clearNotifications', [NotificationController::class, 'clearNotifications']);

/* mahasiswa */

Route::group(['middleware' => ['auth', 'rolecek:user']], function () {

    Route::get('dashboard-mahasiswa-yudisium', [MahasiswaYudisiumController::class, 'index']);
    Route::post('dashboard-mahasiswa-yudisium/update-mahasiswa', [MahasiswaYudisiumController::class, 'updateMahasiswa']);
    Route::post('dashboard-mahasiswa-yudisium/update-persyaratan', [MahasiswaYudisiumController::class, 'updatePersyaratan']);
    Route::get('dashboard-mahasiswa-yudisium/tentang-yudisium', [MahasiswaYudisiumController::class, 'tentangYudisium']);
    Route::get('dashboard-mahasiswa-yudisium/reset/{nrp}/{persyaratan}', [MahasiswaYudisiumController::class, 'resetPersyaratan']);
    Route::get('dashboard-mahasiswa-yudisium/konfirmasi-persyaratan-mahasiswa/{nrp}', [MahasiswaYudisiumController::class, 'konfirmasiPersyaratan']);
    Route::get('dashboard-mahasiswa-yudisium/tarikAjuan/{nrp}', [MahasiswaYudisiumController::class, 'tarikAjuan']);

    // Route::get('/dashboard-mahasiswa', function () {
    //     return view('mahasiswa.dashboard-mahasiswa');
    // });
    Route::get('dashboard-mahasiswa', [TAController::class, 'index1']);

    #Residensi TA Mahasiswa
    Route::get('dashboard-mahasiswa-residensi-ta', [Mahasiswa_Residensi_Controller::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-residensi-ta', [Mahasiswa_Residensi_Controller::class, 'create']);
    Route::post('dashboard-mahasiswa-residensi-ta', [Mahasiswa_Residensi_Controller::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-residensi-ta/{id}', [Mahasiswa_Residensi_Controller::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-residensi-ta/{id}', [Mahasiswa_Residensi_Controller::class, 'update']); //update
    Route::delete('dashboard-mahasiswa-residensi-ta/{id}', [Mahasiswa_Residensi_Controller::class, 'delete']); //delete

    #TA Mahasiswa
    Route::get('dashboard-mahasiswa-proposal-ta', [TAController::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-ta', [TAController::class, 'create']);
    Route::post('dashboard-mahasiswa-proposal-ta', [TAController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-ta/{id}', [TAController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-proposal-ta/{id}', [TAController::class, 'update']); //update
    Route::delete('dashboard-mahasiswa-proposal-ta/{id}', [TAController::class, 'delete']); //delete

    #proposal Mahasiswa
    // Route::get('dashboard-mahasiswa-proposal-ta', [ProposalController::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-proposal-ta', [ProposalController::class, 'create']);
    Route::post('dashboard-mahasiswa-proposal-ta/proposal', [ProposalController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-proposal-ta/{id}', [ProposalController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-proposal-ta/proposal/{id}', [ProposalController::class, 'update']); //update
    Route::delete('dashboard-mahasiswa-proposal-ta/proposal/{id}', [ProposalController::class, 'delete']); //delete

    #seminar TA
    Route::get('dashboard-mahasiswa-seminar-ta', [SeminarController::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-seminar-ta', [SeminarController::class, 'create']);
    Route::post('dashboard-mahasiswa-seminar-ta', [SeminarController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-seminar-ta/{id}', [SeminarController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-seminar-ta/{id}', [SeminarController::class, 'update']); //update
    Route::delete('dashboard-mahasiswa-seminar-ta/{id}', [SeminarController::class, 'delete']); //delete

    // Sidang TA
    Route::get('dashboard-mahasiswa-sidang-ta', [MahasiswaSidangTAController::class, 'index']);
    Route::get('dashboard-mahasiswa-sidang-ta-tambah-data', [MahasiswaSidangTAController::class, 'create']); //create 
    Route::post('dashboard-mahasiswa-sidang-ta', [MahasiswaSidangTAController::class, 'storee']); //store
    Route::get('dashboard-mahasiswa-sidang-ta-edit-data/{id}', [MahasiswaSidangTAController::class, 'edit']); //select
    Route::PUT('dashboard-mahasiswa-sidang-ta/{id}', [MahasiswaSidangTAController::class, 'update']); //update
    Route::delete('dashboard-mahasiswa-sidang-ta/{id}', [MahasiswaSidangTAController::class, 'delete']); //delete

    #kp
    Route::get('dashboard-mahasiswa-kp', [KPController::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-kp', [KPController::class, 'create']);
    Route::post('dashboard-mahasiswa-kp', [KPController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-kp/{id}', [KPController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-kp/{id}', [KPController::class, 'update']); //update
    Route::delete('dashboard-mahasiswa-kp/{id}', [KPController::class, 'delete']); //delete

    #Form-001 
    Route::get('dashboard-mahasiswa-form-001', [Form001Controller::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-form-001', [Form001Controller::class, 'create']);
    Route::post('dashboard-mahasiswa-form-001', [Form001Controller::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-form-001/{id}', [Form001Controller::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-form-001/{id}', [Form001Controller::class, 'update']); //update
    Route::delete('dashboard-mahasiswa-form-001/{id}', [Form001Controller::class, 'delete']); //delete
    Route::get('mahasiswa-generate-form-001/{id}', [Form001Controller::class, 'generateForm001']); //generate form-001
    // Route::get('dashboard-mahasiswa-tambah-file/{id}', [Form001Controller::class, 'edit2']);
    // Route::get('dashboard-mahasiswa-tambah-file/{id}', [Form001Controller::class, 'tambahFile']);
    // Route::post('dashboard-mahasiswa-form-001', [Form001Controller::class, 'store2']);
    // Route::get('mahasiswa-generate-form-001/{id}', [Form001Controller::class, 'generateForm001']); 
    Route::get('generate_nilai_kp', [NilaiDosPemController::class, 'generateNilaiKP']); //TESTING generate nilai


    #Sidang_kp
    Route::get('dashboard-mahasiswa-sidang-kp', [SidangKPController::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-sidang-kp', [SidangKPController::class, 'create']);
    Route::post('dashboard-mahasiswa-sidang-kp', [SidangKPController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-sidang-kp/{id}', [SidangKPController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-sidang-kp/{id}', [SidangKPController::class, 'update']); //update
    Route::delete('dashboard-mahasiswa-sidang-kp/{id}', [SidangKPController::class, 'delete']); //delete


    #Nilai
    Route::get('dashboard-mahasiswa-penilaian-kp', [NilaiDosPemController::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-penilaian-kp-dospem', [NilaiDosPemController::class, 'create']);
    Route::post('dashboard-mahasiswa-penilaian-kp', [NilaiDosPemController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-penilaian-kp-dospem/{id}', [NilaiDosPemController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-penilaian-kp/{id}', [NilaiDosPemController::class, 'update']);
    Route::delete('dashboard-mahasiswa-penilaian-kp/{id}', [NilaiDosPemController::class, 'delete']); //delete

    Route::get('dashboard-mahasiswa-tambah-penilaian-kp-dospem-perusahaan', [NilaiDosPemPerusahaanController::class, 'create']);
    Route::post('dashboard-mahasiswa-penilaian-kp/perusahaan', [NilaiDosPemPerusahaanController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-penilaian-kp-dospem-perusahaan/{id}', [NilaiDosPemPerusahaanController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-penilaian-kp/perusahaan/{id}', [NilaiDosPemPerusahaanController::class, 'update']);
    Route::delete('dashboard-mahasiswa-penilaian-kp/perusahaan/{id}', [NilaiDosPemPerusahaanController::class, 'delete']); //delete 

    Route::get('dashboard-mahasiswa-tambah-penilaian-sidang-kp', [NilaiSidangKPController::class, 'create']);
    Route::post('dashboard-mahasiswa-penilaian-kp/sidang', [NilaiSidangKPController::class, 'store']);


    #bimbingan_ta
    Route::get('dashboard-mahasiswa-bimbingan-ta', [BimbinganTAController::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-bimbingan-ta', [BimbinganTAController::class, 'create']);
    Route::post('dashboard-mahasiswa-bimbingan-ta', [BimbinganTAController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-bimbingan-ta/{id}', [BimbinganTAController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-bimbingan-ta/{id}', [BimbinganTAController::class, 'update']); //update
    Route::get('dashboard-mahasiswa-bimbingan-ta-print', [BimbinganTAController::class, 'generate']);


    #bimbingan_kp
    Route::get('dashboard-mahasiswa-bimbingan-kp', [BimbinganKPController::class, 'index']);
    Route::get('dashboard-mahasiswa-tambah-bimbingan-kp', [BimbinganKPController::class, 'create']);
    Route::post('dashboard-mahasiswa-bimbingan-kp', [BimbinganKPController::class, 'store']);
    Route::get('dashboard-mahasiswa-edit-bimbingan-kp/{id}', [BimbinganKPController::class, 'edit']); //select
    Route::put('dashboard-mahasiswa-bimbingan-kp/{id}', [BimbinganKPController::class, 'update']); //update
    Route::get('dashboard-mahasiswa-bimbingan-kp-print', [BimbinganKPController::class, 'generate']);


    #profil
    Route::get('profile-mahasiswa', [ProfileController::class, 'index']);
});

// Route::get('/index', function () {
//     return view('index');
// });

// Route::get('/dashboard-mahasiswa-tambah-ta', function () {
//     return view('mahasiswa.dashboard-mahasiswa-tambah-ta');
// });

// Route::get('/dashboard-mahasiswa-proposal-ta', function () {
//     return view('mahasiswa.dashboard-mahasiswa-proposal-ta');
// })

// Route::get('/dashboard-mahasiswa-sidang-ta', function () {
//     return view('mahasiswa.dashboard-mahasiswa-sidang-ta');
// });


/* koordinator ta */
Route::group(['middleware' => ['auth', 'rolecek:koordinator-yudisium']], function () {
    // INDEX
    Route::get('dashboard-koordinator-yudisium', [YudisiumController::class, 'index']);
    Route::get('dashboard-koordinator-yudisium/berkas/{id}', [YudisiumController::class, 'lihatBerkasMahasiswa']);
    Route::post('dashboard-koordinator-yudisium/berkas/{id}/aksi', [YudisiumController::class, 'aksiBerkasMahasiswa']);

    // // proposal TA
    // Route::get('dashboard-koordinator-tambah-proposal-ta', [KoordinatorProposalController::class, 'create']);
    // Route::post('dashboard-koordinator-proposal-ta/proposal', [KoordinatorProposalController::class, 'store']);
    // Route::get('dashboard-koordinator-edit-proposal-ta/{id}', [KoordinatorProposalController::class, 'edit']); //select
    // Route::put('dashboard-koordinator-proposal-ta/proposal/{id}', [KoordinatorProposalController::class, 'update']); //update
    // Route::delete('dashboard-koordinator-proposal-ta/proposal/{id}', [KoordinatorProposalController::class, 'delete']); //delete

    // // Seminar TA
    // Route::get('dashboard-koordinator-seminar-ta', [KoordinatorSeminarController::class, 'index']);
    // Route::get('dashboard-koordinator-tambah-seminar-ta', [KoordinatorSeminarController::class, 'create']);
    // Route::post('dashboard-koordinator-seminar-ta', [KoordinatorSeminarController::class, 'store']);
    // Route::get('dashboard-koordinator-edit-seminar-ta/{id}', [KoordinatorSeminarController::class, 'edit']); //select
    // Route::put('dashboard-koordinator-seminar-ta/{id}', [KoordinatorSeminarController::class, 'update']); //update
    // Route::delete('dashboard-koordinator-seminar-ta/{id}', [KoordinatorSeminarController::class, 'delete']); //delete

    // // Mahasiswa
    // Route::get('dashboard-koordinator-ta', [MahasiswaController::class, 'index']);
    // Route::get('dashboard-koordinator-tambah-data-mahasiswa', [MahasiswaController::class, 'create']); //create 
    // Route::post('dashboard-koordinator-tambah-data-mahasiswa', [MahasiswaController::class, 'store']); //store
    // Route::get('dashboard-koordinator-edit-data-mahasiswa/{id}', [MahasiswaController::class, 'edit']); //select
    // Route::PUT('dashboard-koordinator-ta/{id}', [MahasiswaController::class, 'update']); //update
    // Route::delete('dashboard-koordinator-ta/{id}', [MahasiswaController::class, 'delete']); //delete

    // // Dosen
    // Route::get('dashboard-koordinator-ta-dosen', [DosenController::class, 'index']);
    // Route::get('dashboard-koordinator-tambah-data-dosen', [DosenController::class, 'create']); //create 
    // Route::post('dashboard-koordinator-tambah-data-dosen', [DosenController::class, 'store']); //store
    // Route::get('dashboard-koordinator-edit-data-dosen/{id}', [DosenController::class, 'edit']); //select
    // Route::PUT('dashboard-koordinator-ta-dosen/{id}', [DosenController::class, 'update']); //update
    // Route::delete('dashboard-koordinator-ta-dosen/{id}', [DosenController::class, 'delete']); //delete

    // // KP
    // Route::get('dashboard-koordinator-kp', [KoordinatorKPController::class, 'index']);
    // Route::get('dashboard-koordinator-tambah-kp', [KoordinatorKPController::class, 'create']);
    // Route::post('dashboard-koordinator-tambah-kp', [KoordinatorKPController::class, 'store']);
    // Route::get('dashboard-koordinator-edit-kp/{id}', [KoordinatorKPController::class, 'edit']);
    // Route::put('dashboard-koordinator-kp/{id}', [KoordinatorKPController::class, 'update']);
    // Route::delete('dashboard-koordinator-kp/{id}', [KoordinatorKPController::class, 'delete']); //delete

    // // Sidang KP
    // Route::get('dashboard-koordinator-sidang-kp', [KoordinatorSidangKPController::class, 'index']);
    // Route::get('dashboard-koordinator-tambah-sidang-kp', [KoordinatorSidangKPController::class, 'create']);
    // Route::post('dashboard-koordinator-tambah-sidang-kp', [KoordinatorSidangKPController::class, 'store']);
    // Route::get('dashboard-koordinator-edit-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'edit']);
    // Route::put('dashboard-koordinator-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'update']);
    // Route::delete('dashboard-koordinator-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'delete']); //delete

    #profile
    Route::get('profile-koordinator-yudisium', [ProfileController::class, 'index']);
});

/* koordinator ta */
Route::group(['middleware' => ['auth', 'rolecek:koordinator']], function () {
    // TA
    Route::get('dashboard-koordinator-proposal-ta', [KoordinatorTAController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-ta', [KoordinatorTAController::class, 'create']);
    Route::post('dashboard-koordinator-proposal-ta', [KoordinatorTAController::class, 'store']);
    Route::get('dashboard-koordinator-edit-ta/{id}', [KoordinatorTAController::class, 'edit']); //select
    Route::put('dashboard-koordinator-proposal-ta/{id}', [KoordinatorTAController::class, 'update']); //update
    Route::delete('dashboard-koordinator-proposal-ta/{id}', [KoordinatorTAController::class, 'delete']); //delete

    // proposal TA
    Route::get('dashboard-koordinator-tambah-proposal-ta', [KoordinatorProposalController::class, 'create']);
    Route::post('dashboard-koordinator-proposal-ta/proposal', [KoordinatorProposalController::class, 'store']);
    Route::get('dashboard-koordinator-edit-proposal-ta/{id}', [KoordinatorProposalController::class, 'edit']); //select
    Route::put('dashboard-koordinator-proposal-ta/proposal/{id}', [KoordinatorProposalController::class, 'update']); //update
    Route::delete('dashboard-koordinator-proposal-ta/proposal/{id}', [KoordinatorProposalController::class, 'delete']); //delete

    #Residensi TA Koordinator
    Route::get('dashboard-koordinator-residensi-ta', [KoordinatorResidensi::class, 'index']);
    //Route::get('dashboard-koordinator-tambah-residensi-ta', [Koordinator_Residensi_Controller::class, 'create']);
    //Route::post('dashboard-koordinator-residensi-ta', [Koordinator_Residensi_Controller::class, 'store']);
    //Route::get('dashboard-koordinator-edit-residensi-ta/{id}', [Koordinator_Residensi_Controller::class, 'edit']); //select
    //Route::put('dashboard-koordinator-residensi-ta/{id}', [Koordinator_Residensi_Controller::class, 'update']); //update
    //Route::delete('dashboard-koordinator-residensi-ta/{id}', [Koordinator_Residensi_Controller::class, 'delete']); //delete

    // Seminar TA
    Route::get('dashboard-koordinator-seminar-ta', [KoordinatorSeminarController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-seminar-ta', [KoordinatorSeminarController::class, 'create']);
    Route::post('dashboard-koordinator-seminar-ta', [KoordinatorSeminarController::class, 'store']);
    Route::get('dashboard-koordinator-edit-seminar-ta/{id}', [KoordinatorSeminarController::class, 'edit']); //select
    Route::put('dashboard-koordinator-seminar-ta/{id}', [KoordinatorSeminarController::class, 'update']); //update
    Route::delete('dashboard-koordinator-seminar-ta/{id}', [KoordinatorSeminarController::class, 'delete']); //delete

    // Mahasiswa
    Route::get('dashboard-koordinator-ta', [MahasiswaController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-data-mahasiswa', [MahasiswaController::class, 'create']); //create 
    Route::post('dashboard-koordinator-tambah-data-mahasiswa', [MahasiswaController::class, 'store']); //store
    Route::get('dashboard-koordinator-edit-data-mahasiswa/{id}', [MahasiswaController::class, 'edit']); //select
    Route::PUT('dashboard-koordinator-ta/{id}', [MahasiswaController::class, 'update']); //update
    Route::delete('dashboard-koordinator-ta/{id}', [MahasiswaController::class, 'delete']); //delete

    // Dosen
    Route::get('dashboard-koordinator-ta-dosen', [DosenController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-data-dosen', [DosenController::class, 'create']); //create 
    Route::post('dashboard-koordinator-tambah-data-dosen', [DosenController::class, 'store']); //store
    Route::get('dashboard-koordinator-edit-data-dosen/{id}', [DosenController::class, 'edit']); //select
    Route::PUT('dashboard-koordinator-ta-dosen/{id}', [DosenController::class, 'update']); //update
    Route::delete('dashboard-koordinator-ta-dosen/{id}', [DosenController::class, 'delete']); //delete

    // KP
    Route::get('dashboard-koordinator-kp', [KoordinatorKPController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-kp', [KoordinatorKPController::class, 'create']);
    Route::post('dashboard-koordinator-tambah-kp', [KoordinatorKPController::class, 'store']);
    Route::get('dashboard-koordinator-edit-kp/{id}', [KoordinatorKPController::class, 'edit']);
    Route::put('dashboard-koordinator-kp/{id}', [KoordinatorKPController::class, 'update']);
    Route::delete('dashboard-koordinator-kp/{id}', [KoordinatorKPController::class, 'delete']); //delete

    // Sidang KP
    Route::get('dashboard-koordinator-sidang-kp', [KoordinatorSidangKPController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-sidang-kp', [KoordinatorSidangKPController::class, 'create']);
    Route::post('dashboard-koordinator-tambah-sidang-kp', [KoordinatorSidangKPController::class, 'store']);
    Route::get('dashboard-koordinator-edit-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'edit']);
    Route::put('dashboard-koordinator-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'update']);
    Route::delete('dashboard-koordinator-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'delete']); //delete

    // bimbingan TA 
    Route::get('dashboard-koordinator-bimbingan-ta', [KoordinatorBimbinganTA::class, 'index']);
    Route::get('dashboard-koordinator-tambah-bimbingan-ta', [KoordinatorBimbinganTA::class, 'create']);
    Route::post('dashboard-koordinator-bimbingan-ta', [KoordinatorBimbinganTA::class, 'store']);
    Route::get('dashboard-koordinator-edit-bimbingan-ta/{id}', [KoordinatorBimbinganTA::class, 'edit']);
    Route::put('dashboard-koordinator-bimbingan-ta/{id}', [KoordinatorBimbinganTA::class, 'update']);
    Route::delete('dashboard-koordinator-bimbingan-ta/{id}', [KoordinatorBimbinganTA::class, 'delete']); //delete

    //Sidang TA
    Route::get('dashboard-koordinator-sidang-ta', [KoordinatorSidangTAController::class, 'index']);
    Route::get('dashboard-koordinator-sidang-ta-tambah-data', [KoordinatorSidangTAController::class, 'create']); //create 
    Route::post('dashboard-koordinator-sidang-ta', [KoordinatorSidangTAController::class, 'storee']); //store
    Route::get('dashboard-koordinator-sidang-ta-edit-data/{id}', [KoordinatorSidangTAController::class, 'edit']); //select
    Route::PUT('dashboard-koordinator-sidang-ta/{id}', [KoordinatorSidangTAController::class, 'update']); //update
    Route::delete('dashboard-koordinator-sidang-ta/{id}', [KoordinatorSidangTAController::class, 'delete']); //delete

    #profile
    Route::get('profile-koordinator', [ProfileController::class, 'index']);
});


Route::group(['middleware' => ['auth', 'rolecek:dosen,koordinator,koordinator_kp']], function () {

    // proposal
    Route::get('dashboard-dospem-proposal-ta', [DospemProposalController::class, 'index']);
    Route::get('dashboard-dospem-edit-proposal-ta/{id}', [DospemProposalController::class, 'edit']);
    Route::put('dashboard-dospem-proposal-ta/{id}', [DospemProposalController::class, 'update']);
    Route::get('dashboard-dospenguji-proposal-ta', [DospengProposalController::class, 'index']);
    Route::get('dashboard-dospenguji-edit-proposal-ta/{id}', [DospengProposalController::class, 'edit']);
    Route::put('dashboard-dospenguji-proposal-ta/{id}', [DospengProposalController::class, 'update']);

    // Seminar 
    Route::get('dashboard-dospem-seminar-ta', [DospemSeminarController::class, 'index']);
    Route::get('dashboard-dospem-edit-seminar-ta/{id}', [DospemSeminarController::class, 'edit']);
    Route::put('dashboard-dospem-seminar-ta/{id}', [DospemSeminarController::class, 'update']);
    Route::get('dashboard-dospenguji-seminar-ta', [DospengSeminarController::class, 'index']);
    Route::get('dashboard-dospenguji-edit-seminar-ta/{id}', [DospengSeminarController::class, 'edit']);
    Route::put('dashboard-dospenguji-seminar-ta/{id}', [DospengSeminarController::class, 'update']);

    // REsidensi
    Route::get('dashboard-dospem-residensi-ta', [Dosen_Residensi::class, 'indexDospem']);
    Route::get('dashboard-dospenguji-residensi-ta', [Dosen_Residensi::class, 'indexDospeng']);

    // Sidang KP
    Route::get('dashboard-dospem-sidang-kp', [DospemSidangKPController::class, 'index']);
    Route::get('dashboard-dospem-edit-sidang-kp/{id}', [DospemSidangKPController::class, 'edit']);
    Route::put('dashboard-dospem-sidang-kp/{id}', [DospemSidangKPController::class, 'update']);
    Route::get('dashboard-dospenguji-sidang-kp', [DospengSidangKPController::class, 'index']);
    Route::get('dashboard-dospenguji-edit-sidang-kp/{id}', [DospengSidangKPController::class, 'edit']);
    Route::put('dashboard-dospenguji-sidang-kp/{id}', [DospengSidangKPController::class, 'update']);

    // Nilai
    Route::get('dashboard-koordinator-penilaian-kp', [NilaiDosPemController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-penilaian-kp-dospem', [NilaiDosPemController::class, 'create']);
    Route::post('dashboard-koordinator-penilaian-kp', [NilaiDosPemController::class, 'store']);
    Route::get('dashboard-koordinator-edit-penilaian-kp-dospem/{id}', [NilaiDosPemController::class, 'edit']); //select
    Route::put('dashboard-koordinator-penilaian-kp/{id}', [NilaiDosPemController::class, 'update']);
    Route::delete('dashboard-koordinator-penilaian-kp/{id}', [NilaiDosPemController::class, 'delete']); //delete

    //Form001
    Route::get('dashboard-koordinator-form-001', [KoordinatorKPForm001Controller::class, 'index']);
    // Route::get('dashboard-koordinator-tambah-kp', [KoordinatorKPController::class, 'create']);
    // Route::post('dashboard-koordinator-tambah-kp', [KoordinatorKPController::class, 'store']);
    // Route::get('dashboard-koordinator-edit-kp/{id}', [KoordinatorKPController::class, 'edit']);
    // Route::put('dashboard-koordinator-kp/{id}', [KoordinatorKPController::class, 'update']);
    // Route::delete('dashboard-koordinator-kp/{id}', [KoordinatorKPController::class, 'delete']); //delete

    // Bimbingan Tugas Akhir
    Route::get('dashboard-dospem-bimbingan-ta', [DospemBimbinganTAController::class, 'index']);
    Route::get('dashboard-dospem-edit-bimbingan-ta/{id}', [DospemBimbinganTAController::class, 'edit']);
    Route::put('dashboard-dospem-bimbingan-ta/{id}', [DospemBimbinganTAController::class, 'update']);

    // bimbingan kerja praktik
    Route::get('dashboard-dospem-bimbingan-kp', [DospemBimbinganKPController::class, 'index']);
    Route::get('dashboard-dospem-edit-bimbingan-kp/{id}', [DospemBimbinganKPController::class, 'edit']);
    Route::put('dashboard-dospem-bimbingan-kp/{id}', [DospemBimbinganKPController::class, 'update']);

    //Sidang TA
    Route::get('dashboard-dospem-sidang-ta', [DospemSidangTAController::class, 'index']);
    Route::get('dashboard-dospem-sidang-ta-edit-data/{id}', [DospemSidangTAController::class, 'edit']); //select
    Route::PUT('dashboard-dospem-sidang-ta/{id}', [DospemSidangTAController::class, 'update']); //update
    Route::get('dashboard-dospeng-sidang-ta', [DospengSidangTAController::class, 'index']);
    Route::get('dashboard-dospeng-sidang-ta-edit-data/{id}', [DospengSidangTAController::class, 'edit']); //select
    Route::PUT('dashboard-dospeng-sidang-ta/{id}', [DospengSidangTAController::class, 'update']); //update

    #profile
    Route::get('profile-dosen', [ProfileController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'rolecek:tu']], function () {

    Route::get('dashboard-tata-usaha', [UsersController::class, 'index']);
    Route::get('dashboard-tata-usaha-tambah-data-mahasiswa', [UsersController::class, 'create']); //create 
    Route::post('dashboard-tata-usaha-tambah-data-mahasiswa', [UsersController::class, 'store']); //store
    Route::get('dashboard-tata-usaha-edit-data-mahasiswa/{id}', [UsersController::class, 'edit']);
    Route::put('dashboard-tata-usaha/{id}', [UsersController::class, 'update']);

    Route::get('dashboard-tata-usaha-proposal-ta', [TUProposalSeminarSidangController::class, 'indexProposal']);
    Route::get('dashboard-tata-usaha-seminar-ta', [TUProposalSeminarSidangController::class, 'indexSeminar']);
    Route::get('dashboard-tata-usaha-sidang-kp', [TUProposalSeminarSidangController::class, 'indexSidangKP']);
    Route::get('sidang-kp-test/{id}', [TUProposalSeminarSidangController::class, 'sidangkptest']);

    //Form-001
    Route::get('dashboard-tata-usaha-form-001', [TUForm001Controller::class, 'index']);
    Route::get('dashboard-tata-usaha-edit-form-001/{id}', [TUForm001Controller::class, 'edit']);
    Route::put('dashboard-tata-usaha-form-001/{id}', [TUForm001Controller::class, 'update']);

    // Route::get('generate-form-001/{id}', [Form001Controller::class, 'generateForm001TU']); //generate form-001
    Route::get('dashboard-tata-usaha-yudisium', [YudisiumController::class, 'index']);
    Route::get('dashboard-tata-usaha-yudisium/berkas/{id}', [YudisiumController::class, 'lihatBerkasMahasiswa']);
    Route::post('dashboard-tata-usaha-yudisium/berkas/{id}/aksi', [YudisiumController::class, 'aksiBerkasMahasiswa']);

    //Sidang TA
    Route::get('dashboard-tu-sidang-ta', [TUProposalSeminarSidangController::class, 'indexSidangTA']);

    #profile
    Route::get('profile-tu', [ProfileController::class, 'index']);
});


// Route::get('/dashboard-koordinator-ta', function () {
//     return view('koordinator.dashboard-koordinator-ta');
// });

// Route::get('/dashboard-koordinator-sidang-ta', function () {
//     return view('koordinator.dashboard-koordinator-sidang-ta');
// });

// Route::get('/generate-form-001', function () {
//     return view('tata_usaha.generate-form-001');
// });

/* koordinator kp */
Route::group(['middleware' => ['auth', 'rolecek:koordinator-kp']], function () {

    // // Mahasiswa
    // Route::get('dashboard-koordinator-kp-mahasiswa', [MahasiswaController::class, 'index']);
    // Route::get('dashboard-koordinator-kp-tambah-data-mahasiswa', [MahasiswaController::class, 'create']); //create 
    // Route::post('dashboard-koordinator-kp-tambah-data-mahasiswa', [MahasiswaController::class, 'store']); //store
    // Route::get('dashboard-koordinator-kp-edit-data-mahasiswa/{id}', [MahasiswaController::class, 'edit']); //select
    // Route::PUT('dashboard-koordinator-kp/{id}', [MahasiswaController::class, 'update']); //update
    // Route::delete('dashboard-koordinator-kp/{id}', [MahasiswaController::class, 'delete']); //delete

    // // Dosen
    // Route::get('dashboard-koordinator-kp-dosen', [DosenController::class, 'index']);
    // Route::get('dashboard-koordinator-kp-tambah-data-dosen', [DosenController::class, 'create']); //create 
    // Route::post('dashboard-koordinator-kp-tambah-data-dosen', [DosenController::class, 'store']); //store
    // Route::get('dashboard-koordinator-kp-edit-data-dosen/{id}', [DosenController::class, 'edit']); //select
    // Route::PUT('dashboard-koordinator-kp-ta-dosen/{id}', [DosenController::class, 'update']); //update
    // Route::delete('dashboard-koordinator-kp-dosen/{id}', [DosenController::class, 'delete']); //delete

    // KP
    Route::get('dashboard-koordinator-kp', [KoordinatorKPController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-kp', [KoordinatorKPController::class, 'create']);
    Route::post('dashboard-koordinator-tambah-kp', [KoordinatorKPController::class, 'store']);
    Route::get('dashboard-koordinator-edit-kp/{id}', [KoordinatorKPController::class, 'edit']);
    Route::put('dashboard-koordinator-kp/{id}', [KoordinatorKPController::class, 'update']);
    Route::delete('dashboard-koordinator-kp/{id}', [KoordinatorKPController::class, 'delete']); //delete

    // Sidang KP
    Route::get('dashboard-koordinator-sidang-kp', [KoordinatorSidangKPController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-sidang-kp', [KoordinatorSidangKPController::class, 'create']);
    Route::post('dashboard-koordinator-tambah-sidang-kp', [KoordinatorSidangKPController::class, 'store']);
    Route::get('dashboard-koordinator-edit-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'edit']);
    Route::put('dashboard-koordinator-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'update']);
    Route::delete('dashboard-koordinator-sidang-kp/{id}', [KoordinatorSidangKPController::class, 'delete']); //delete

    // bimbingan KP
    Route::get('dashboard-koordinator-bimbingan-kp', [KoordinatorBimbinganKP::class, 'index']);
    Route::get('dashboard-koordinator-tambah-bimbingan-kp', [KoordinatorBimbinganKP::class, 'create']);
    Route::post('dashboard-koordinator-bimbingan-kp', [KoordinatorBimbinganKP::class, 'store']);
    Route::get('dashboard-koordinator-edit-bimbingan-kp/{id}', [KoordinatorBimbinganKP::class, 'edit']);
    Route::put('dashboard-koordinator-bimbingan-kp/{id}', [KoordinatorBimbinganKP::class, 'update']);
    Route::delete('dashboard-koordinator-bimbingan-kp/{id}', [KoordinatorBimbinganKP::class, 'delete']); //delete

    // Nilai
    Route::get('dashboard-koordinator-penilaian-kp', [NilaiKoordinatorKPController::class, 'index']);
    Route::get('dashboard-koordinator-tambah-penilaian-kp', [NilaiKoordinatorKPController::class, 'create']);
    Route::post('dashboard-koordinator-penilaian-kp', [NilaiKoordinatorKPController::class, 'store']);
    Route::get('dashboard-koordinator-edit-penilaian-kp/{id}', [NilaiKoordinatorKPController::class, 'edit']); //select
    Route::put('dashboard-koordinator-penilaian-kp/{id}', [NilaiKoordinatorKPController::class, 'update']);
    Route::delete('dashboard-koordinator-penilaian-kp/{id}', [NilaiKoordinatorKPController::class, 'delete']); //delete

    //Form001
    Route::get('dashboard-koordinator-form-001', [KoordinatorKPForm001Controller::class, 'index']);

    //profile
    Route::get('profile-koordinator-kp', [ProfileController::class, 'index']);
});

// TA
// Route::get('/dashboard-koordinator-proposal-ta', function () {
//     return view('koordinator.dashboard-koordinator-proposal-ta');
// });

// Route::get('/dashboard-koordinator-seminar-ta', function () {
//     return view('koordinator.dashboard-koordinator-seminar-ta');
// });

// Route::get('/dashboard-koordinator-ta-dosen', function () {
//     return view('koordinator.dashboard-koordinator-ta-dosen');
// });

// Route::get('/dashboard-koordinator-tambah-data-mahasiswa', function () {
//     return view('koordinator.dashboard-koordinator-tambah-data-mahasiswa');
// });




/* Dosen Pembimbing dan Dosen Penguji */
// Route::get('/dashboard-dospem-proposal-ta', function () {
//     return view('dosen_pembimbing_penguji.dashboard-dospem-proposal-ta');
// });

// Route::get('/dashboard-dospem-seminar-ta', function () {
//     return view('dosen_pembimbing_penguji.dashboard-dospem-seminar-ta');
// });

// Route::get('/dashboard-dospem-sidang-ta', function () {
//     return view('dosen_pembimbing_penguji.dashboard-dospem-sidang-ta');
// });

// Route::get('/dashboard-dospenguji-proposal-ta', function () {
//     return view('dosen_pembimbing_penguji.dashboard-dospenguji-proposal-ta');
// });

// Route::get('/dashboard-dospenguji-seminar-ta', function () {
//     return view('dosen_pembimbing_penguji.dashboard-dospenguji-seminar-ta');
// });

// Route::get('/dashboard-dospenguji-sidang-ta', function () {
//     return view('dosen_pembimbing_penguji.dashboard-dospenguji-sidang-ta');
// });

// Route::get('/dashboard-koordinator-form001', function () {
//     return view('dashboard.dashboard-koordinator-form001');
// });

/* Tata Usaha */
// // Route::get('/dashboard-tata-usaha', function () {
//     return view('tata_usaha.dashboard-tata-usaha');
// });

// Route::get('/dashboard-tata-usaha-proposal-ta', function () {
//     return view('tata_usaha.dashboard-tata-usaha-proposal-ta');
// });

// Route::get('/dashboard-tata-usaha-seminar-ta', function () {
//     return view('tata_usaha.dashboard-tata-usaha-seminar-ta');
// });

// Route::get('/dashboard-tata-usaha-sidang-ta', function () {
//     return view('tata_usaha.dashboard-tata-usaha-sidang-ta');
// });

// Route::get('/dashboard-tata-usaha-tambah-data-mahasiswa', function () {
//     return view('tata_usaha.dashboard-tata-usaha-tambah-data-mahasiswa');
// });


// Route::get('/dashboard-tata-usaha-tambah-data-mahasiswa', 'AuthController@dashboard-tata-usaha-tambah-data-mahasiswa');
// Route::post('/dashboard-tata-usaha-tambah-data-mahasiswa', 'AuthController@dashboard-tata-usaha-tambah-data-mahasiswa');


// Route::get('/dashboard-tata-usaha-tambah-data-mahasiswa', [AuthController::class, 'getRegister']);
// Route::post('/dashboard-tata-usaha-tambah-data-mahasiswa', [AuthController::class, 'postRegister']);

// Route::get('dashboard-koordinator-ta', [UsersController::class, 'index']);
// Route::get('dashboard-koordinator-tambah-data-mahasiswa', [UsersController::class, 'create']); //create 
// Route::post('dashboard-koordinator-tambah-data-mahasiswa', [UsersController::class, 'store']); //store


Route::get('/nilai', function () {
    return view('dosen.penilaian_dospem_kp');
});
