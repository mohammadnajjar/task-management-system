<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = User::all();
        $departments = Department::all();
        $projects = Project::all();
        $tasks = [];
        $status = ['todo','pending', 'in_progress', 'completed'];
        foreach ($projects as $project) {
            for ($i = 0; $i < 5; $i++) {
                $date = $faker->dateTimeBetween('-1 months', '+1 months');
                $tasks[] = [
                    'name' => $faker->sentence(4),
                    'description' => $faker->sentence(20),
                    'deadline' => $date,
                    'department_id' => $departments->random()->id,
                    'user_id' => $users->random()->id,
                    'project_id' => $project->id,
                    'status' => $status[array_rand($status)],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }
        Task::insert($tasks);
    }
}
