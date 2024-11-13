<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create("pengaduans", function (Blueprint $table) {
      $table->id();
      $table->foreignId("masyarakat_id")->constrained("masyarakats");
      $table->date("tgl_pengaduan");
      $table->text("isi_laporan");
      $table->string("foto");
      $table->enum("status", ["0", "proses", "selesai"]);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists("pengaduans");
  }
};
