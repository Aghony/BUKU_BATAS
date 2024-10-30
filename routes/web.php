<?php

use App\Exports\SiswasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\uiguruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\uikelasController;
use App\Http\Controllers\AkunGuruController;
use App\Http\Controllers\BukuBatasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenKelasController;
use App\Http\Controllers\BatasMapelController;
use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\LaporanMapelController;
use App\Http\Controllers\LaporanSiswaController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\BatasPelajaranController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TrackUserActivity;
use App\Models\Matapelajaran;

Route::middleware(['guest'])->group(function(){
Route::get('/',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class,'login']);
});



// Route::get('import/', [])

Route::middleware(['auth', TrackUserActivity::class])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('/dashboard', [DashboardController::class, 'guru'])->name('dashboard.guru');
Route::get('/online-users', [UserController::class, 'onlineUsers']);

//route Export 
// Route::get('siswa/export/excel', [SiswaController::class, 'export_excel']);
Route::get('laporan/excel/download', [LaporanController::class, 'export_excel'])->name('laporan.download_excel');
Route::get('laporan/absen/siswa/excel/download', [LaporanSiswaController::class, 'export_excel'])->name('absensiswa.download_excel');

//route Import
Route::get('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
Route::get('/download-template-excel', function () {
  $filePath = public_path('templates/template_siswa.xlsx');
  return response()->download($filePath, 'template_siswa.xlsx');
});
Route::post('/siswa/import/excel', [SiswaController::class, 'import_excel'])->name('siswa.import.excel');

Route::get('/download-template-excel-mapel', function () {
  $filePath = public_path('templates/template_matapelajaran.xlsx');
  return response()->download($filePath, 'template_matapelajaran.xlsx');
});
Route::get('/matapelajaran/import', [MatapelajaranController::class, 'import'])->name('matapelajaran.import');
Route::post('/matapelajaran/import/excel', [MatapelajaranController::class, 'import_excel'])->name('matapelajaran.import.excel');

//route CRUD
Route::resource('guru', GuruController::class);
Route::resource('kelas', KelasController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('matapelajaran', MatapelajaranController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('bukubatas', BukuBatasController::class);
Route::resource('absensisiswa', AbsensiSiswaController::class);
Route::resource('batasmapel',BatasMapelController::class);
Route::resource('absenkelas',AbsenKelasController::class);
// 
Route::resource('profile',ProfileController::class);
//

//route laporan
Route::resource('laporan',LaporanController::class);
Route::resource('laporansiswa',LaporanSiswaController::class);
Route::resource('laporanmapel',LaporanMapelController::class);


Route::get('/addbataspelajaran', [DashboardController::class, 'addbataspelajaran']);
// Route::get('/profileadmin', [DashboardController::class, 'profileadmin']);
// Route::get('/profileadmin/{id}/update', [DashboardController::class, 'update'])->name('profileadmin.update');

//route logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
