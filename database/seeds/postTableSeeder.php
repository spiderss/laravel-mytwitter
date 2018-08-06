<?php

use Illuminate\Database\Seeder;
use App\Post;
class postTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0;$i<50;$i++){
            Post::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'user_id' => random_int(1, 4)
            ]);
        }
    }
}
