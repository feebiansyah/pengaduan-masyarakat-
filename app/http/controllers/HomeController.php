<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
      if(Auth::check() && Auth::user()->nik){
        $loginAs = 'Masyarakat';
      }
      
      $user = Auth::user()->nama_lengkap;
      return view('home', [
        'user' => $user,
        'loginAs' => $loginAs
        ]);
    }
}
