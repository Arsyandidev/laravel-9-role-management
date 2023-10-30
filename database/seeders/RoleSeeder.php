<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        $user = User::create(array_merge([
            'name' => 'Arsyandi',
            'email' => 'arsyandi@gmail.com',
        ], $default_user_value));

        $admin = User::create(array_merge([
            'name' => 'Farid',
            'email' => 'farid@gmail.com',
        ], $default_user_value));

        $auditor = User::create(array_merge([
            'name' => 'Tika',
            'email' => 'tika@gmail.com',
        ], $default_user_value));

        $inspektur = User::create(array_merge([
            'name' => 'Ricky',
            'email' => 'ricky@gmail.com',
        ], $default_user_value));

        $role_user = Role::create(['name' => 'user']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_auditor = Role::create(['name' => 'auditor']);
        $role_inspektur = Role::create(['name' => 'inspektur']);

        $permission = Permission::create(['name' => 'read']);
        $permission = Permission::create(['name' => 'create']);
        $permission = Permission::create(['name' => 'update']);
        $permission = Permission::create(['name' => 'delete']);

        $admin->givePermissionTo('read');
        $admin->givePermissionTo('create');
        $admin->givePermissionTo('update');
        $admin->givePermissionTo('delete');

        $auditor->givePermissionTo('read');
        $auditor->givePermissionTo('create');
        $auditor->givePermissionTo('update');
        $auditor->givePermissionTo('delete');

        $inspektur->givePermissionTo('read');
        $inspektur->givePermissionTo('create');
        $inspektur->givePermissionTo('update');
        $inspektur->givePermissionTo('delete');

        $user->assignRole('user');
        $admin->assignRole('admin');
        $auditor->assignRole('auditor');
        $inspektur->assignRole('inspektur');
    }
}
