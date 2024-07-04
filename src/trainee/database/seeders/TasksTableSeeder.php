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
                'name' => $faker->sentence(3), // Generate a 3-word sentence for the task name
                'description' => $faker->paragraph(2), // Generate a 2-paragraph description (optional)
                'category_id' => rand(1, 10), // Assign a random category ID (assuming you have 10 categories)
                'completed' => false, // Default to not completed
            ]);
        }
    }
}
