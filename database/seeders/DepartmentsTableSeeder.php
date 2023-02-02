<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'HR'],
            ['name' => 'IT'],
            ['name' => 'Marketing'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
