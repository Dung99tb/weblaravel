<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,100) as $index)
        {
            DB::table('products')->insert([
                'name' => $faker->name,
                'price' => 5000,
                'feature_image_path' => '/storage/product/1/OrjydV4fuXtO9rV4mrhP.jpg',
                'content' => 'tessttsetstest',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => $faker->dateTimeBetween('-6 month', '+1 month')
            ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}
