<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','ekjyot091@gmail.com')->first();
        if(!$user){
            User::create([
                'name'=>'admin',
                'email'=>'ekjyot091@gmail.com',
                'password'=>Hash::make('11111111'),
                'role'=>'admin'
            ]);
        }
        
    }
}
