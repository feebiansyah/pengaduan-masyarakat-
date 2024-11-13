<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function showLogin()
  {
    return view("auth.login");
  }

  public function login(Request $request)
  {
    $request->validate([
      "username" => "required",
      "password" => "required",
    ]);

    if (Auth::guard('masyarakat')->attempt([
        "username" => $request->username,
        "password" => $request->password,
      ])
    ) {
      $request->session()->regenerate();
      
      return redirect()->route('home');
    }
    
    if (Auth::guard('petugas')->attempt([
        "username" => $request->username,
        "password" => $request->password,
      ])
    ) {
      
      $request->session()->regenerate();
      
      return redirect()->route('petugas');
    }
    
    
    
    return back()->with('fail', 'username atau password salah');
  }

  public function showRegister()
  {
    return view("auth.register");
  }
  public function register(Request $request)
  {
    $validated_request = $request->validate([
      "nik" => "required|min:16|max:16",
      "nama_lengkap" => "required|min:3|max:255",
      "username" => "required|min:3|max:255|unique:masyarakats",
      "password" => "required|min:3|max:255",
      "no_telp" => "required|min:3|max:255",
    ]);
    $validated_request["password"] = Hash::make($validated_request["password"]);

    $masyarakat = Masyarakat::create($validated_request);

    Auth::login($masyarakat);

    return redirect()->route("home");
  }
  
  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }
}
