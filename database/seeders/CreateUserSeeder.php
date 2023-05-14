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
        $users = User::factory()->count(5)->create();

        foreach($users as $user){
            $user->assignRole(Roles::Guest->value);
        }

    }
}
