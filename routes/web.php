<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AlternatifController;
use App\Http\Controllers\admin\BobotRaporController;
use App\Http\Controllers\admin\BobotRmibController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\KategoriRmibController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\KriteriaController;
use App\Http\Controllers\admin\MataPelajaranController;
use App\Http\Controllers\admin\SiswaController;
use App\Http\Controllers\admin\SoalRmibController;
use App\Http\Controllers\siswa\HomeSiswaController;
use App\Http\Controllers\siswa\LampiranRaporController;
use App\Http\Controllers\siswa\NilaiRaporController;
use App\Http\Controllers\siswa\TesRmibController;
use App\Models\admin\Alternatif;
use App\Models\admin\KategoriRmib;
use PharIo\Manifest\AuthorElement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', AuthController::class);
Route::get('/admin', [AuthController::class, 'authAdmin']);
Route::get('/adminRegister', [AuthController::class, 'registerAdmin']);
Route::POST('/loginAdmin', [AuthController::class, 'loginAdmin']);
Route::POST('/createAdmin', [AuthController::class, 'createAdmin']);
Route::GET('/logoutAdmin', [AuthController::class, 'logoutAdmin']);

Route::get('/auth', [AuthController::class, 'auth']);
Route::POST('/loginSiswa', [AuthController::class, 'loginSiswa']);
Route::GET('/logoutSiswa', [AuthController::class, 'logoutSiswa']);
Route::resource('/siswa/homeSiswa', HomeSiswaController::class);
Route::GET('/ubahPasswordSiswa', [AuthController::class, 'ubahPasswordSiswa']);
Route::POST('/ubahPasswordSiswaProses', [AuthController::class, 'ubahPasswordSiswaProses']);

Route::resource('/admin/homeAdmin', HomeAdminController::class);
Route::resource('/admin/dataAdmin', AdminController::class);
Route::POST('/admin/dataAdmin/activate', [AdminController::class, 'activate']);
Route::POST('/admin/dataAdmin/deactivate', [AdminController::class, 'deactivate']);
Route::resource('/admin/kelasAdmin', KelasController::class);
Route::resource('/admin/siswaAdmin', SiswaController::class);
Route::POST('/admin/siswaAdmin/resetPassword', [SiswaController::class, 'resetPassword']);
Route::resource('/admin/kriteriaAdmin', KriteriaController::class);
Route::resource('/admin/kategoriRmib', KategoriRmibController::class);
Route::resource('/admin/soalRmib', SoalRmibController::class);
Route::resource('/admin/alternatifAdmin', AlternatifController::class);
Route::resource('/admin/bobotRmib', BobotRmibController::class);
Route::POST('/admin/aturbobotRmib', [BobotRmibController::class, 'aturBobot']);
Route::POST('/admin/hapusbobotRmib', [BobotRmibController::class, 'hapusBobot']);
Route::resource('/admin/bobotRapor', BobotRaporController::class);
Route::POST('/admin/aturbobotRapor', [BobotRaporController::class, 'aturBobot']);
Route::resource('/admin/mataPelajaran', MataPelajaranController::class);

Route::resource('/siswa/tesRmibSiswa', TesRmibController::class);
Route::GET('/siswa/formSiswa', [TesRmibController::class, 'formSiswa']);
Route::resource('/siswa/raporSiswa', NilaiRaporController::class);
Route::POST('/siswa/updateRapor', [NilaiRaporController::class, 'updateRapor']);
Route::GET('/siswa/submitRapor', [NilaiRaporController::class, 'submitRapor']);
Route::resource('/siswa/lampiranRapor', LampiranRaporController::class);