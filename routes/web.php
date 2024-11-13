<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;



Route::group(["middleware" => "auth:masyarakat"], function () {
  Route::get("/logout", [AuthController::class, "logout"])->name("logout");
  Route::get("/", [HomeController::class, "index"])->name("home");
  Route::get("/pengaduan", [PengaduanController::class, "index"])->name(
    "pengaduan"
  );
  Route::post("/pengaduan", [PengaduanController::class, "store"]);
  Route::get("/riwayat", [PengaduanController::class, "riwayat"])->name(
    "riwayat"
  );
  Route::get("/riwayat/detail/{pengaduan}", [
    PengaduanController::class,
    "detail",
  ])->name("detail");
  
  Route::get("/riwayat/edit/{pengaduan}", [
    PengaduanController::class,
    "editPengaduan",
  ])->name("editPengaduan");
  
  Route::put("/riwayat/edit/{pengaduan}", [
    PengaduanController::class,
    "storeEditPengaduan",
  ]);
  
  Route::get("/pengaduan/hapus/{pengaduan}", [
    PengaduanController::class,
    "hapusPengaduan",
  ]);
  
  
});

Route::group(["middleware" => "auth:petugas"], function(){
  Route::get('/petugas', [PetugasController::class, "index"])->name('petugas');
  Route::get('/petugas/tanggapan', [PetugasController::class,
  "daftarPengaduan"])->name('petugas.tanggapan');
  Route::get('/petugas/tanggapan/detail/{pengaduan}', [PetugasController::class,
  "tulisTanggapan"])->name('petugas.tanggapan.detail');
  Route::post('/petugas/tanggapan/{pengaduan}', [PetugasController::class,
  'storeTulisTanggapan']);
  Route::get('/petugas/laporan', [PetugasController::class,
  'laporan']);
  Route::get('/petugas/tambah-petugas', [PetugasController::class,
  'tambahPetugas']);
  
  
});

Route::group(["middleware" => "guest"], function () {
  Route::get("/register", [AuthController::class, "showRegister"])->name(
    "register"
  );
  Route::post("/register", [AuthController::class, "register"])->name(
    "register"
  );
  Route::get("/login", [AuthController::class, "showLogin"])->name("login");
  Route::post("/login", [AuthController::class, "login"])->name("login");
});
