<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name'=>'Record'
        ]);
        Tag::create([
            'name'=>'Progress'
        ]);
        Tag::create([
            'name'=>'Customers'
        ]);
        Tag::create([
            'name'=>'Freebie'
        ]);
        Tag::create([
            'name'=>'Offer'
        ]);
        Tag::create([
            'name'=>'Screenshot'
        ]);
        Tag::create([
            'name'=>'Milestone'
        ]);
    }
}
