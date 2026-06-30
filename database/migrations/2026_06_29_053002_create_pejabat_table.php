<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pejabat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelurahan_id')->nullable()->constrained('kelurahan')->cascadeOnDelete();
            $table->string('nama', 150);
            $table->string('nip', 30)->nullable();
            $table->string('jabatan', 100);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pejabat');
    }
};
