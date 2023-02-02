<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Department::all();
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('123456789'),
                'role' => 'admin',
                'department_id' => $departments->random()->id,
            ],
            [
                'name' => 'Sub-Admin User',
                'email' => 'subadmin@example.com',
                'password' => bcrypt('123456789'),
                'role' => 'sub-admin',
                'department_id' => $departments->random()->id,
            ],
            [
                'name' => 'Employee',
                'email' => 'employee@example.com',
                'password' => bcrypt('123456789'),
                'role' => 'employee',
                'department_id' => $departments->random()->id,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
