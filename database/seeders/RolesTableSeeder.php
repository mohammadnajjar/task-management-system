<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'sub-admin', 'employee'];

        foreach ($roles as $role) {
            $createdRole = Role::create(['name' => $role]);
            $users = User::all();
            foreach($users as $user){
                if($user->role === $role) {
                    $user->assignRole($createdRole);
                }
            }
        }

    }
}
