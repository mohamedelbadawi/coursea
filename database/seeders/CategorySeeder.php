<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Programming']);
        Category::create(['name' => 'Graphic']);
        Category::create(['name' => 'Art']);
        Category::create(['name' => 'Languages']);
        Category::create(['name' => 'Career development']);
        Category::create(['name' => 'Marketing']);
        Category::create(['name' => 'Health & Fitness']);
        Category::create(['name' => 'Music']);
    }
}
