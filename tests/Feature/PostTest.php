<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    
    public function test_post_page_can_render()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    public function test_authentificated_user_can_render_my_posts_page()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->get('/myPosts');

        $response->assertStatus(200);
    }

    public function test_unauthentificated_user_cannot_render__my_posts_page()
    {
        $response = $this->get('/myPosts');

        $response->assertStatus(302);
    }

    public function test_authentificated_user_can_render_create_post() {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->get('/createPost');

        $response->assertStatus(200);
    }

    public function test_unauthentificated_user_cannot_render_create_post() {
        $response = $this->get('/createPost');

        $response->assertStatus(302);
    }

    public function test_authentificated_user_can_save_new_post() {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $post = Post::factory()->make();

        $response = $this->post('/storePost', [
            'title' => $post->title,
            'description' => $post->description,
            'publication_date' => $post->publication_date,
        ]);

        $response->assertStatus(200);
    }

    public function test_unauthentificated_user_cannot_save_new_post() {
        $post = Post::factory()->make();

        $response = $this->post('/storePost', [
            'title' => $post->title,
            'description' => $post->description,
            'publication_date' => $post->publication_date,
        ]);

        $response->assertStatus(302);
    }

    public function test_simgle_post_page_can_render() {
        $response = $this->get('/showPost/1');

        $response->assertStatus(200);
    }

}
