<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sktm_documents', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 100)->unique();
            $table->date('tanggal_surat');
            $table->string('nik_pemohon', 16);
            $table->string('nama_pemohon', 150);
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kelamin_pemohon', 20)->nullable();
            $table->string('agama', 50)->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->string('perkawinan', 50)->nullable();
            $table->string('negara', 50)->default('Indonesia');
            $table->text('alamat')->nullable();
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->string('kelurahan', 100)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->string('kota_kabupaten', 100)->nullable();
            $table->string('desil', 100)->nullable();
            $table->text('peruntukan')->nullable();
            $table->string('pengantar_rt', 100)->nullable();
            $table->foreignId('pejabat_id')->nullable()->constrained('pejabat');
            $table->string('nama_pejabat', 150)->nullable();
            $table->string('nip_pejabat', 30)->nullable();
            $table->string('jabatan', 100)->nullable();
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
        Schema::dropIfExists('sktm_documents');
    }
};
