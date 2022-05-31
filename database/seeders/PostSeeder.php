<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://sq1-api-test.herokuapp.com/posts');
        $responseBody = json_decode($response->body());
        // As we only know the user name and not it's id,
        // we need to get it from the database for that given user name
        $admin = User::where('name', 'admin')->first();
        foreach ($responseBody->data as $post) {
            $newPost = new Post();
            $newPost->title = $post->title;
            $newPost->description = $post->description;
            $newPost->publication_date = $post->publication_date;
            $newPost->user_id = $admin->id;
            $newPost->save();
        }

        // We create other posts for the Users seeded using tinker
        Post::factory()
            ->count(20)
            ->create();
    }
}
