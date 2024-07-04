<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        // Seed with 5 tasks with random names and descriptions
        for ($i = 0; $i < 5; $i++) {
            DB::table('tasks')->insert([
                'name' => $faker->sentence(3), 
                'description' => $faker->paragraph(2),
                'category_id' => rand(1, 10), 
                'completed' => false,
            ]);
        }
    }
}
