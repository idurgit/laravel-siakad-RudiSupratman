<?php

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
        Schema::create('absensi_matkuls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('student_id')->constrained('users');
            $table->string('kode_absensi');
            $table->string('tahun_akademik');
            $table->string('semester');
            $table->string('pertemuan');
            $table->string('status');
            $table->string('keterangan')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('nilai')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_matkuls');
    }
};
