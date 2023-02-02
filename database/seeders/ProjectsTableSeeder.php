<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Project;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $projects = [];
        $departments = Department::all()->pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            $date = $faker->dateTimeBetween('-1 months', '+1 months');
            $projects[] = [
                'name' => $faker->sentence(4),
                'description' => $faker->sentence(20),
                'deadline' => $date->modify('+5 days'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        Project::insert($projects);

        foreach (Project::all() as $project) {
            $project->departments()->attach($faker->randomElements($departments, 1));
        }

    }
}
