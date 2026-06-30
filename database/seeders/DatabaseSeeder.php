<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            KelurahanSeeder::class,
            AdminUserSeeder::class,
            AppSettingSeeder::class,
        ]);
    }
}
