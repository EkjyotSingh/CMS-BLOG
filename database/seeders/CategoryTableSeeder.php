<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'News'
        ]);
        Category::create([
            'name'=>'Updates'
        ]);
        Category::create([
            'name'=>'Design'
        ]);
        Category::create([
            'name'=>'Marketing'
        ]);
        Category::create([
            'name'=>'Partnership'
        ]);
    }
}
