<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('it_IT');

        for ($i = 0; $i <= 5; $i++) {
            $newTag = new Tag();
            $newTag->name = strtoupper($faker->word());
            $newTag->save();
        }
        
    }
}