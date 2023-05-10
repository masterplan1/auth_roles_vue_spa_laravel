<?php

namespace Database\Seeders;

use App\Enums\Authorization\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => Hash::make('123qwe123')
        ]);

        $user->assignRole(Role::where('name', '!=', 'admin')->get()->random()->name);
    }
}
