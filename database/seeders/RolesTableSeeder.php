<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesTableSeeder extends Seeder
{
    public function run():void
    {
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'employee'],
        ]);

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit employee  data']);
        Permission::create(['name' => 'delete employee data']);
        Permission::create(['name' => 'create employee data']);
        Permission::create(['name' => 'assign role']);

        // create roles and assign existing permissions
    

        $role1 = Role::create(['admin' => 'create']);
        $role1->givePermissionTo('edit employee data');
        $role1->givePermissionTo('delelete employee data');

        $role2 = Role::create(['employee' => 'View']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'SuperUser',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
        ]);
        $user->assignRole($role3);
    }

    /**
     * Create the initial roles and permissions.
     */
    
}
