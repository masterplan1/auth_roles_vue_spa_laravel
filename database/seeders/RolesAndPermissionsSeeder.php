<?php

namespace Database\Seeders;

use App\Enums\Authorization\Permissions;
use App\Enums\Authorization\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // user permissions
        Permission::create(['name' => Permissions::CreateUser->value]);
        Permission::create(['name' => Permissions::ViewUser->value]);
        Permission::create(['name' => Permissions::ViewUsersList->value]);
        Permission::create(['name' => Permissions::EditUser->value]);
        Permission::create(['name' => Permissions::DeleteUser->value]);
        // articles permissions
        Permission::create(['name' => Permissions::CreateArticles->value]);
        Permission::create(['name' => Permissions::EditArticles->value]);
        Permission::create(['name' => Permissions::DeleteArticles->value]);
        Permission::create(['name' => Permissions::PublishArticles->value]);
        Permission::create(['name' => Permissions::UnpublishArticles->value]);
        Permission::create(['name' => Permissions::ViewArticles->value]);
        // roles permissions
        Permission::create(['name' => Permissions::ViewRoles->value]);
        Permission::create(['name' => Permissions::EditRole->value]);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => Roles::Admin->value]);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => Roles::Guest->value]);
        $role->givePermissionTo(Permissions::ViewArticles->value);

        $role = Role::create(['name' => Roles::Customer->value]);
        $role->givePermissionTo([
            Permissions::ViewArticles->value, 
            Permissions::CreateArticles->value,
            Permissions::EditArticles->value,
            Permissions::DeleteArticles->value,
        ]);

        $role = Role::create(['name' => Roles::Manager->value]);
        $role->givePermissionTo([
            Permissions::ViewArticles->value,
            Permissions::EditArticles->value,
            Permissions::UnpublishArticles->value,
            Permissions::PublishArticles->value,
            Permissions::CreateArticles->value,
            Permissions::DeleteArticles->value,
        ]);

    }
}
