<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Technology', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Fashion', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Books', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Music', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Movies & TV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gaming', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sports', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Travel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Food & Cooking', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Health & Wellness', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
