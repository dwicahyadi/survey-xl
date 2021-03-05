<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'access settings']);
        Permission::create(['name' => 'manage questions']);
        Permission::create(['name' => 'manage a dealer']);
        Permission::create(['name' => 'manage all dealers']);
        Permission::create(['name' => 'survey']);

        // create roles and assign created permissions

        Role::create(['name' => 'super admin'])
        ->givePermissionTo(Permission::all());

        Role::create(['name' => 'principle'])
            ->givePermissionTo([ 'manage questions','manage a dealer','manage all dealers','survey']);

        Role::create(['name' => 'admin dealer'])
            ->givePermissionTo(['manage a dealer']);

        Role::create(['name' => 'surveyor'])
            ->givePermissionTo(['survey']);


        /*Create super admin account*/
        $admin = User::create(['name'=>'Super Admin','email'=>'super@avacentral.com','password'=>bcrypt('password')]);
        $admin->assignRole('super admin');


    }
}
