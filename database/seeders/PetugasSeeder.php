<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table("petugas")->insert([
      [
        "nama_petugas" => "petugas",
        "username" => "petugas",
        "password" => Hash::make("petugas"),
        "no_telp" => "08938727684",
        "level" => "petugas",
      ],
      [
        "nama_petugas" => "admin",
        "username" => "admin",
        "password" => Hash::make("admin"),
        "no_telp" => "08933734",
        "level" => "admin",
      ]
      ]);
  }
}
