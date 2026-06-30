<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use App\Models\Pejabat;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    public function run(): void
    {
        $kelurahan = Kelurahan::firstOrCreate(
            ['nama' => 'Cibodas'],
            ['nama' => 'Cibodas',
            'nama_lengkap' => 'Kelurahan Cibodas',
            'alamat' => 'Jl. Raya Cibodas No. 1',
            'kecamatan' => 'Cibodas',
            'kota' => 'Kota Tangerang',
            'kode_pos' => '15138',
            'telepon' => '(021) 12345678',
            'email' => 'kel.cibodas@tangerangkota.go.id',
            'nama_lurah' => 'Dr. H. Ahmad Suryana, S.Sos., M.Si.',
            'nip_lurah' => '197001011998031001',
        ]);

        Pejabat::insert([
            [
                'kelurahan_id' => $kelurahan->id,
                'nama' => 'Dr. H. Ahmad Suryana, S.Sos., M.Si.',
                'nip' => '197001011998031001',
                'jabatan' => 'Lurah',
                'is_active' => true,
            ],
            [
                'kelurahan_id' => $kelurahan->id,
                'nama' => 'Drs. Bambang Wijaya',
                'nip' => '197502152005021002',
                'jabatan' => 'Sekretaris Kelurahan',
                'is_active' => true,
            ],
            [
                'kelurahan_id' => $kelurahan->id,
                'nama' => 'Siti Rahmawati, S.E.',
                'nip' => '198003102006042003',
                'jabatan' => 'Kasi Pemerintahan',
                'is_active' => true,
            ],
            [
                'kelurahan_id' => $kelurahan->id,
                'nama' => 'Hendra Gunawan, S.Sos.',
                'nip' => '198105202007011004',
                'jabatan' => 'Kasi Kesejahteraan Sosial',
                'is_active' => true,
            ],
        ]);
    }
}
