<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
  protected function checkRole()
  {
    if (Auth::check() && Auth::user()->nik) {
      $loginAs = "Masyarakat";
    }
    return $loginAs;
  }

  public function index()
  {
    $loginAs = $this->checkRole();

    return view("pengaduan.form", [
      "loginAs" => $loginAs,
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      "isi_laporan" => "required|string",
      "foto" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
    ]);

    $fotoName = time() . "." . $request->foto->extension();
    $request->foto->move(public_path("uploads"), $fotoName);

    Pengaduan::create([
      "masyarakat_id" => Auth::user()->id,
      "tgl_pengaduan" => Carbon::now(),
      "isi_laporan" => $request->isi_laporan,
      "foto" => "uploads/" . $fotoName,
      "status" => "0",
    ]);
    return redirect()
      ->route("riwayat")
      ->with("success", "Pengaduan berhasil dikirim");
  }

  public function riwayat()
  {
    $loginAs = $this->checkRole();
    $id_masyarakat = Auth::user()->id;
    $nama_masyarakat = Masyarakat::where("id", $id_masyarakat)->value(
      "nama_lengkap"
    );

    $pengaduan = Pengaduan::with("masyarakat")
      ->where("masyarakat_id", $id_masyarakat)
      ->get();

    return view("pengaduan.riwayat", [
      "loginAs" => $loginAs,
      "all_data" => $pengaduan,
      "nama_masyarakat" => $nama_masyarakat,
    ]);
  }
  public function detail(Pengaduan $pengaduan)
  {
    $loginAs = $this->checkRole();
    $tanggapan = Tanggapan::where('pengaduan_id', $pengaduan->id)->get();

    return view("pengaduan.detail", [
      "loginAs" => $loginAs,
      "detail_laporan" => $pengaduan,
      "tanggapan" => $tanggapan
    ]);
  }
  public function editPengaduan(Pengaduan $pengaduan)
  {
    $loginAs = $this->checkRole();
    if ($pengaduan->masyarakat_id !== Auth::id()) {
      return abort(403);
    }

    return view("pengaduan.edit", [
      "loginAs" => $loginAs,
      "pengaduan" => $pengaduan,
    ]);
  }

  public function storeEditPengaduan(Request $request, Pengaduan $pengaduan)
  {
    $request->validate([
      "isi_laporan" => "required|string",
      "foto" => "image|mimes:jpeg,png,jpg,gif|max:2048",
    ]);

    $pengaduan->isi_laporan = $request->isi_laporan;

    if ($request->hasFile("foto")) {
      if (File::exists(public_path($pengaduan->foto))) {
        File::delete(public_path($pengaduan->foto));
      }
      $fotoName = time() . "." . $request->foto->extension();
      $request->foto->move(public_path('uploads'), $fotoName);
      $pengaduan->foto = "uploads/" . $fotoName;
    }

    $pengaduan->save();
    return redirect()->route('detail', $pengaduan->id)->with('success', 'Ubah
    pengaduan berhasil');
  }
  
  public function hapusPengaduan(Pengaduan $pengaduan)
  {
    $pengaduan->delete();
    
    if (File::exists(public_path($pengaduan->foto))) {
        File::delete(public_path($pengaduan->foto));
      }
      return redirect()->route('riwayat')->with('success',
      'hapus data pengaduan berhasil');
  }
}
