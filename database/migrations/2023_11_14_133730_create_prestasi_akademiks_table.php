<?php

use App\Models\Siswa;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestasi_akademiks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Siswa::class);
            $table->string('juara');
            $table->string('lomba');
            $table->string('penyelenggara');
            $table->string('tingkat');
            $table->date('tanggal');
            $table->string('sertifikat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi_akademiks');
    }
};
