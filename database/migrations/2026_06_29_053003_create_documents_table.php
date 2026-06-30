<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 100);
            $table->string('jenis_dokumen', 100);
            $table->date('tanggal_surat');
            $table->text('perihal');
            $table->string('sifat', 50)->nullable();
            $table->integer('jumlah_lampiran')->default(0);
            $table->text('tujuan')->nullable();
            $table->text('isi_surat')->nullable();
            $table->text('akhiran')->nullable();
            $table->string('hari_acara', 50)->nullable();
            $table->string('tanggal_acara', 100)->nullable();
            $table->string('waktu_acara', 100)->nullable();
            $table->text('tempat_acara')->nullable();
            $table->text('data_acara')->nullable();
            $table->string('nama_pejabat', 255)->nullable();
            $table->string('nip_pejabat', 50)->nullable();
            $table->string('jabatan', 100)->nullable();
            $table->text('storage_bucket_url');
            $table->string('file_name', 255)->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->foreignId('kelurahan_id')->nullable()->constrained('kelurahan')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status', 20)->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
