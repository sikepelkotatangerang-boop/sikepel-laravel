<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 20)->default('user')->after('email');
            $table->foreignId('kelurahan_id')->nullable()->constrained('kelurahan')->nullOnDelete()->after('role');
            $table->boolean('is_active')->default(true)->after('kelurahan_id');
            $table->string('phone', 20)->nullable()->after('is_active');
            $table->text('address')->nullable()->after('phone');
            $table->string('avatar')->nullable()->after('address');
            $table->string('nip', 30)->nullable()->after('avatar');
            $table->string('position', 100)->nullable()->after('nip');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'kelurahan_id', 'is_active', 'phone', 'address', 'avatar', 'nip', 'position']);
        });
    }
};
