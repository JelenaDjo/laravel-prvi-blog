<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexValid() // ime metode test, pa ime metode iz kontrolera pa onda sta testiramo, valid veong i td
    {
        $response= $this->get('/posts');

        $response->assertStatus(200); // assert je asertacija ili PROVERAVANJE
    }
    public function testCreateValid()
    {
        $user= factory(User::class)->create();

        $response= $this->actingAs($user)
                    ->get('/posts/create');
        $response->assertStatus(200);

    }


    public function testCreateInvalid()
    {
        $response = $this->get('/posts/create');
        $response-> assertStatus(302);
    }

    public function testShowValid()
    {
        $user= factory(User::class)->create();
        
        $post= factory(Post::class)->create(['author_id'=> $user->id]);
                        
        $response=$this->actingAs($user)
                        ->get('/posts/'. $post->id);

        $response->assertStatus(200);
    }
    public function testShowInvalid()
    {
        $user= factory(User::class)->create();
        
        $post= factory(Post::class)->create(['author_id'=> $user->id]);
                        
        $response=$this->actingAs($user)
                        ->get('/posts/99999999');

        $response->assertStatus(404);
    }
}
