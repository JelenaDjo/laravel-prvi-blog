<?php

namespace Tests\Unit;

use App\Tag;
use App\Comment;
use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostsTableValid()
    {
         $user= factory(User::class)->create(); 
         $post = factory(Post::class)->create([
             'author_id' =>$user->id
         ]);

         $this->assertDatabaseHas('posts', [
                'title' =>$post->title
            ]);
    }

    public function testCommentsTableTestValid()
    {
        $user= factory(User::class)->create(); 
         $post = factory(Post::class)->create([
             'author_id' =>$user->id
         ]);

         $post->comments()->saveMany(factory(
             Comment::class, 10
         )->make());

         $this->assertEquals(10, $post->comments()->count());
 
    }
    public function testTagsTableTestValid()
    {
        $user= factory(User::class)->create(); 
        $post = factory(Post::class)->create(['author_id'=>$user->id]);
        //$tag= factory(Tag::class)->create();
        $post->tags()->saveMany(factory(Tag::class, 10)->make());
     

         
        
        //$this->assertDatabaseHas('tags',['name'=>$tag->name]);
        $this->assertEquals(10, $post->tags()->count());

    }
    public function testTagsTableValid()
    {
       
        $tag= factory(Tag::class)->create();
        //$post->tags()->saveMany(factory(Tag::class, 10)->make());
     

         
        
        $this->assertDatabaseHas('tags',['name'=>$tag->name]);
        //$this->assertEquals(10, $post->tags()->count());

    }
}
