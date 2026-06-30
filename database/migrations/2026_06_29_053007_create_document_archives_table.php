<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_archives', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 100);
            $table->string('jenis_dokumen', 50);
            $table->date('tanggal_surat');
            $table->text('perihal')->nullable();
            $table->string('nik_subjek', 16)->nullable();
            $table->string('nama_subjek', 150);
            $table->text('alamat_subjek')->nullable();
            $table->json('data_detail')->nullable();
            $table->foreignId('pejabat_id')->nullable()->constrained('pejabat');
            $table->string('nama_pejabat', 150)->nullable();
            $table->string('nip_pejabat', 30)->nullable();
            $table->string('jabatan_pejabat', 100)->nullable();
            $table->string('google_drive_id', 255)->nullable();
            $table->text('google_drive_url')->nullable();
            $table->string('file_name', 255)->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->string('mime_type', 100)->default('application/pdf');
            $table->foreignId('kelurahan_id')->nullable()->constrained('kelurahan');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->string('status', 20)->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_archives');
    }
};
