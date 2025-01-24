<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();

        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        // $user = User::factory()->create(
        //     [
        //         "name" => "Jeet Baldha",
        //         "username" => "jeet_baldha"

        //     ]
        // );

        // Post::factory(5)->create(
        //     [
        //         "user_id" => $user
        //     ]
        // );

        Comment::factory(10)->create();


    }
}
