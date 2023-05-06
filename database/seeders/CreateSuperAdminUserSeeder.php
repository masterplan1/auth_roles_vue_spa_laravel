<?php

namespace Database\Seeders;

use App\Enums\Authorization\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superuser = User::create([
            'name' => 'superuser',
            'email' => 'superuser@example.com',
            'password' => Hash::make('123qwe123')
        ]);

        $superuserRole = Role::create(['name' => Roles::Superuser->value]);
        $superuser->assignRole($superuserRole);
    }
}
