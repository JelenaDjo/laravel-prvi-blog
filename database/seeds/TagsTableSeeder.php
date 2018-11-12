<?php

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
        $values= [
            'Blogging',
            'Freelancing',
            'How to Succeed'
        ];

       App\Tag::truncate();

        foreach ($values as $value){
            App\Tag::create([
                    'name'=>$value
                ]);
        }

        App\Post::all()->each(function(App\Post $post){
            $randomIds = \App\Tag::inRandomOrder()
            ->select('id')
            ->take(2)
            ->pluck('id');
            $post->tags()->attach($randomIds);
        });
    }
}
