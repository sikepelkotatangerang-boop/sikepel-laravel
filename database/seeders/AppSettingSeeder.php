<?php

namespace Database\Seeders;

use App\Models\AppSetting;
use Illuminate\Database\Seeder;

class AppSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'app_name', 'value' => 'SIKEPEL', 'group' => 'general', 'type' => 'text', 'description' => 'Nama Aplikasi'],
            ['key' => 'app_full_name', 'value' => 'Sistem Informasi Kelurahan', 'group' => 'general', 'type' => 'text', 'description' => 'Nama Lengkap Aplikasi'],
            ['key' => 'app_version', 'value' => '1.0.0', 'group' => 'general', 'type' => 'text', 'description' => 'Versi Aplikasi'],
            ['key' => 'kecamatan', 'value' => 'Cibodas', 'group' => 'general', 'type' => 'text', 'description' => 'Kecamatan'],
            ['key' => 'kota', 'value' => 'Kota Tangerang', 'group' => 'general', 'type' => 'text', 'description' => 'Kota/Kabupaten'],
            ['key' => 'logo', 'value' => '', 'group' => 'appearance', 'type' => 'image', 'description' => 'Logo Aplikasi'],
        ];

        foreach ($settings as $s) {
            AppSetting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
