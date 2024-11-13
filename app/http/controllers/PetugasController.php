<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PDF;

class PetugasController extends Controller
{
   protected function checkRole()
  {
    if (Auth::check() && Auth::user()->level == 'admin') {
      $loginAs = "Admin";
    }else if(Auth::check() && Auth::user()->level == 'petugas'){
      $loginAs = 'Petugas';
    }
    return $loginAs;
  }
  
  
    public function index()
    {
      $loginAs = $this->checkRole();
      return view('petugas.index', [
        'loginAs' => $loginAs
        ]);
    }
    
    public function daftarPengaduan()
    {
      $loginAs = $this->checkRole();
      $pengaduan = Pengaduan::with('masyarakat')->get();
      return view('petugas.tanggapan', [
        'pengaduan' => $pengaduan,
        'loginAs' => $loginAs
        ]);
    }
    public function tulisTanggapan(Pengaduan $pengaduan)
    {
      $loginAs = $this->checkRole();
      $tanggapan = Tanggapan::where('pengaduan_id', $pengaduan->id)->get();
      
      return view('petugas.form_tanggapan', [
        'loginAs' => $loginAs,
        'pengaduan' => $pengaduan,
        'tanggapan' => $tanggapan
         ]);
    }
    public function storeTulisTanggapan(Request $request, Pengaduan $pengaduan){
      
      $request->validate([
        "tanggapan" => "required",
        "status" => "required"
        ]);
        
      Tanggapan::create([
        "petugas_id" => Auth::user()->id,
        "pengaduan_id" => $pengaduan->id,
        "tanggal_tanggapan" => Carbon::now(),
        "tanggapan" => $request->tanggapan
        ]);
        
        $pengaduan->update([
          "status" => $request->status
          ]);
        
        return redirect()->route('petugas.tanggapan.detail',
        $pengaduan->id)->with('success', 'Laporan berhasil ditanggapi');
    }
    public function laporan(){
      $pengaduan = Pengaduan::with('masyarakat')->get();
      $pdf = PDF::loadView('petugas.laporan', [ "pengaduan" => $pengaduan]);
      return $pdf->download('laporan.pengaduan.pdf');
    }
    
    public function tambahPetugas()
    {
           $loginAs = $this->checkRole();
      $petugas = Petugas::where('level', 'petugas')->get();
      return view('petugas.tambah_petugas' ,[
        'petugas' => $petugas,
        'loginAs' => $loginAs]);
    }
}
