<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap absensi
            $table->string('nama_siswa'); // Nama siswa
            $table->date('tanggal'); // Tanggal absensi
            $table->enum('status', ['Hadir', 'Tidak Hadir']); // Status absensi
            $table->timestamps(); // Timestamp untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi'); // Menghapus tabel jika rollback
    }
}


