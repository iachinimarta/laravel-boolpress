<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = \Faker\Factory::create('it_IT');
        $faker = \Faker\Factory::create('it_IT');

        for ($i = 0; $i < 11; $i++) {
            $newPost = new Post();
            $newPost->title = ucfirst($faker->word());
            $newPost->content = ucfirst($faker->text());
            $newPost->slug = Str::slug($newPost->title . '-' . $i);
            $newPost->save();
        }
    }
}
