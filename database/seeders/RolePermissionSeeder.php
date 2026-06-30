<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            // Dashboard
            'dashboard.view',
            // Users
            'users.view', 'users.create', 'users.edit', 'users.delete',
            // Roles & Permissions
            'roles.view', 'roles.create', 'roles.edit', 'roles.delete',
            // Kelurahan
            'kelurahan.view', 'kelurahan.edit',
            // Pejabat
            'pejabat.view', 'pejabat.create', 'pejabat.edit', 'pejabat.delete',
            // Documents (Surat Keluar)
            'documents.view', 'documents.create', 'documents.edit', 'documents.delete',
            // Surat Masuk
            'surat_masuk.view', 'surat_masuk.create', 'surat_masuk.edit', 'surat_masuk.delete',
            // SKTM
            'sktm.view', 'sktm.create', 'sktm.edit', 'sktm.delete',
            // Belum Rumah
            'belum_rumah.view', 'belum_rumah.create', 'belum_rumah.edit', 'belum_rumah.delete',
            // Document Archives
            'archives.view', 'archives.delete',
            // Notifications
            'notifications.view', 'notifications.create', 'notifications.delete',
            // Settings
            'settings.view', 'settings.edit',
            // Reports
            'reports.view', 'reports.export',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions(Permission::all());

        $staff = Role::firstOrCreate(['name' => 'staff']);
        $staff->syncPermissions([
            'dashboard.view',
            'documents.view', 'documents.create', 'documents.edit',
            'surat_masuk.view', 'surat_masuk.create', 'surat_masuk.edit',
            'sktm.view', 'sktm.create', 'sktm.edit',
            'belum_rumah.view', 'belum_rumah.create', 'belum_rumah.edit',
            'archives.view',
            'notifications.view',
            'pejabat.view',
            'kelurahan.view',
            'reports.view',
        ]);

        $user = Role::firstOrCreate(['name' => 'user']);
        $user->syncPermissions([
            'dashboard.view',
            'documents.view',
            'surat_masuk.view',
            'sktm.view', 'sktm.create',
            'belum_rumah.view', 'belum_rumah.create',
            'notifications.view',
        ]);
    }
}
