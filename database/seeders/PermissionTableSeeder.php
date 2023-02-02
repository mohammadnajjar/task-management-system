<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //create permissions
        $permissions = [
            'modify-task',
            'assign-task',
            'revoke-task',
            'create-task',
            'update-task',
            'delete-task',
            'show-task',
            'create-user',
            'update-user',
            'delete-user',
            'show-user',
            'create-department',
            'update-department',
            'delete-department',
            'show-department',
            'create-project',
            'update-project',
            'delete-project',
            'show-project',
        ];

        foreach($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        //get admin and sub-admin users
        $admin = Role::whereName('admin')->first();
        $subAdmin = Role::whereName('sub-admin')->first();

        //assign permissions to admin
        $admin->syncPermissions($permissions);

        //assign specific permissions to sub-admin
        $subAdmin->syncPermissions([
            'modify-task',
            'assign-task',
            'revoke-task'
        ]);

        $departmentEmployee = Role::whereName('employee')->first();
        $departmentEmployee->syncPermissions([
            'show-task',
            'update-task',
        ]);
    }
}
