<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Post::create([
            'category_id'=>rand(1,5),
            'title'=>'Top 5 brilliant content marketing strategies',
            'slug'=>Str::slug('Top 5 brilliant content marketing strategies'),
            'description'=>"Worthy all math at of they these a to beings think and she in 
            he I to off poetic not these little of big and one eminent should",
            'content'=>", sides behave.
            Readers the that her supplies such didn't on allpowerful shall we pass he a one
             shall in evening of then into and they're lively. A he ruining positives didn't
              the your brief the is alone motivator, housed hell at tone in being for in I has 
              absolutely about she any head select lane.
           Distant I rationale real in text, was chest the and copy pouring death, curiously, 
           to once turned they place his that trying. At harmonics; Quite to understood. Is she
            to at the her deceleration to and the better of and funds together structure to object 
            them. Fresh what and gain, around him created, hope which a associate the game, I turned 
            at drawers. Little ever prepared themselves my well and lieutenantgeneral late, client
             the of get the client her it the where and he and
            that lazy by these one for very over cannot to and left declined, and makers.",
            'image'=>'1.jpg',
            'user_id'=>rand(1,5)
        ]);
        Post::create([
            'category_id'=>rand(1,5),
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'slug'=>Str::slug('Congratulate and thank to Maryam for joining our team'),
            'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
             modi ducimus volupt
            atibus natus iusto porro adipisci consectetur veniam unde reiciendis.",
            'content'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum tempore 
            dolorem repudiandae assumenda aperiam molestias eligendi laudantium itaque similique 
            delectus tempora nulla harum, vitae exercitationem eos nisi possimus earum! Aperiam a
             perspiciatis at error eligendi recusandae est soluta laudantium, odio culpa, officiis
              corporis repellendus dolorem maxime omnis fugiat similique. Sint dolores nesciunt
               magni sapiente perferendis vero repellendus recusandae, amet optio ullam repellat 
               facere ad molestias incidunt laborum blanditiis, laudantium impedit rerum numquam
                vel, cum sit quo! Ut, magni officiis vitae minus ipsa atque quas non aperiam nesciunt
                 explicabo, consequuntur 
            cumque ex? Repellat, nihil cum! Reprehenderit ipsa rem architecto eum voluptas.",
            'image'=>'2.jpg',
            'user_id'=>rand(1,5)
        ]);
        Post::create([
            'category_id'=>rand(1,5),
            'title'=>'Best practices for minimalist design with example',
            'slug'=>Str::slug('Best practices for minimalist design with example'),
            'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing e
            lit. Perferendis, pariatur cumque illo odit odio veritatis.",
            'content'=>"orporis repellendus dolorem maxime omnis fugiat similique. Sint dolores nesciunt
            magni sapiente perferendis vero repellendus recusandae, amet optio ullam repellat 
            facere ad molestias incidunt laborum blanditiis, laudantium impedit rerum numquam
             vel, cum sit quo! Ut, magni officiis vitae minus ipsa atque quas non aperiam nesciunt
              explicabo, consequuntur ",
            'image'=>'3.jpg',
            'user_id'=>rand(1,5)
        ]);
        Post::create([
            'category_id'=>rand(1,5),
            'slug'=>Str::slug('This is why it\'s time to ditch dress codes at work'),
            'title'=>'This is why it\'s time to ditch dress codes at work',
            'description'=>'ris repellendus dolorem maxime omnis ',
            'content'=>"orporis repellendus dolorem maxime omnis fugiat similique. Sint dolores nesciunt
            magni sapiente perferendis vero repellendus recusandae, amet optio ullam repellat 
            facere ad molestias in
            orporis repellendus dolorem maxime omnis fugiat similique. Sint dolores nesciunt
            magni sapiente perferendis vero repellendus recusandae, amet optio ullam repellat 
            facere ad molestias in",
            'image'=>'4.jpg',
            'user_id'=>rand(1,5)
        ]);
        Post::create([
            'category_id'=>rand(1,5),
            'title'=>'New published books to read by a product designer',
            'slug'=>Str::slug('New published books to read by a product designer'),
            'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, ratione.",
            'content'=>"orporis repellendus dolorem maxime omnis fugiat similique. Sint dolores nesciunt
            magni sapiente perferendis vero repellendus recusandae, amet optio ullam repellat 
            facere ad molestias incidunt laborum blanditiis, laudantium impedit rerum numquam
             vel, cum sit quo! Ut, magni officiis vitae minus ipsa atque quas non aperiam nesciunt
              explicabo, consequuntur
              orporis repellendus dolorem maxime omnis fugiat similique. Sint dolores nesciunt
               magni sapiente perferendis vero repellendus recusandae, amet optio ullam repellat 
               facere ad molestias incidunt laborum blanditiis, laudantium impedit rerum numquam
                vel, cum sit quo! Ut, magni officiis vitae minus ipsa atque quas non aperiam nesciunt
                 explicabo, consequuntur",
            'image'=>'5.jpg',
            'user_id'=>rand(1,5)
        ]);
        Post::create([
            'category_id'=>rand(1,5),
            'title'=>'We relocated our office to a new designed garage',
            'slug'=>Str::slug('We relocated our office to a new designed garage'),
            'description'=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit.
             Provident autem consequatur esse adipisci, aspernatur ullam.",
            'content'=>"orporis repellendus dolorem maxime omnis fugiat similique. Sint dolores nesciunt
            magni sapiente perferendis vero repellendus recusandae, amet optio ullam repellat 
            facere ad molestias incidunt laborum blanditiis, laudantium impedit rerum numquam
             vel, cum sit quo! Ut, magni officiis vitae minus ipsa atque quas non aperiam nesciunt
              explicabo, consequuntur ",
            'image'=>'6.jpg',
            'user_id'=>rand(1,5)
        ]);
    }
}
