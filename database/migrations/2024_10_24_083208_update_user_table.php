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
        Schema::table('user', function (Blueprint $table) {
            // Menghapus kolom 'npm'
            $table->dropColumn('npm');

            // Menambahkan kolom 'jurusan', 'semester', dan 'fakultas_id'
            $table->enum('jurusan', ['fisika', 'kimia', 'biologi', 'matematika', 'ilmu komputer']);
            $table->integer('semester')->unsigned()->check(function (Blueprint $table) {
                $table->check('semester <= 14');
            });
            $table->foreignId('fakultas_id')->nullable()->constrained()->onDelete('cascade'); // Relasi ke tabel fakultas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            // Mengembalikan perubahan: tambahkan kembali kolom 'npm' dan hapus kolom yang ditambahkan
            $table->string('npm');
            $table->dropColumn(['jurusan', 'semester', 'fakultas_id']);
        });
    }
};
