<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('it_IT');

        for ($i = 0; $i <= 7; $i++) {
            $newCategory = new Category();
            $newCategory->name = ucfirst($faker->word());
            $newCategory->description = ucfirst($faker->text());
            $newCategory->save();
        }
        
    }
}
