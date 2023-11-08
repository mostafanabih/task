<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title'=>'post1',
                'content'=>'content 1 content 1 content 1 content 1 content 1 content 1 content 1 content 1 content 1',
                'user_id'=> 1
            ],
            [
                'title'=>'post2',
                'content'=>'content 2 content 2 content 2 content 2 content 2 content 2 content 2 content 2 content 2',
                'user_id'=> 1
            ],
            [
                'title'=>'post3',
                'content'=>'content 3 content 3 content 3 content 3 content 3 content 3 content 3 content 3 content 3',
                'user_id'=> 1
            ],
            [
                'title'=>'post4',
                'content'=>'content 4 content 4 content 4 content 4 content 4 content 4 content 4 content 4 content 4',
                'user_id'=> 1
            ],
            [
                'title'=>'post5',
                'content'=>'content 5 content 5 content 5 content 5 content 5 content 5 content 5 content 5 content 5',
                'user_id'=> 1
            ],
            [
                'title'=>'post6',
                'content'=>'content 6 content 6 content 6 content 6 content 6 content 6 content 6 content 6 content 6',
                'user_id'=> 1
            ],
            [
                'title'=>'post7',
                'content'=>'content 7 content 7 content 7 content 7 content 7 content 7 content 7 content 7 content 7',
                'user_id'=> 1
            ],
            [
                'title'=>'post8',
                'content'=>'content 8 content 8 content 8 content 8 content 8 content 8 content 8 content 8 content 8',
                'user_id'=> 1
            ],
            [
                'title'=>'post9',
                'content'=>'content 9 content 9 content 9 content 9 content 9 content 9 content 9 content 9 content 9',
                'user_id'=> 1
            ],
            [
                'title'=>'post10',
                'content'=>'content 10 content 10 content 10 content 10 content 10 content 10 content 10 content 10 content 10',
                'user_id'=> 1
            ],
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($posts as $post){
            Post::create($post);
        }
    }
}
