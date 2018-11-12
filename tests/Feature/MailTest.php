<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use App\Comment;
use Tests\TestCase;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCommentReceivedValid()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create([
            'author_id'=>$user->id
        ]);


        Mail::fake();

        $this->actingAs($user)->post('/posts/'.$post->id. '/comments',
                    ['text'=>'this is some text more then fif..',
                    'author'=>'some_name']);

        Mail::assertSent(CommentReceived::class, function($mail) use ($post){
            return $mail->post->id === $post->id;
        });
    }

    public function testCommentReceivedNotValid()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create([
            'author_id'=>$user->id
        ]);


        Mail::fake();

        $this->actingAs($user)->post('/posts/'.$post->id. '/comments',
                    ['text'=>'this is some text ..',
                    'author'=>'some_name']);

        Mail::assertNotSent(CommentReceived::class, function($mail) use ($post){
            return $mail->post->id === $post->id;
        });
    }
}
