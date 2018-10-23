<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
  public function store ($postId)
  {
      $post= Post::findOrFail($postId);

      $this->validate(
        request(),
       Comment::VALIDATION_RULES
    );


      $post->comments()->create(
          request()->all()
      );
      return redirect("/posts/{$postId}"); // moraju dupli navodnici a moze i bez viticastih oko id 
      //return redirect('/posts/' .$id);  // moze i ovako da se napise ovo gore
  }  
  public function destroy ($postId, $commentId)
  {
      $comment = Comment::findOrFail($commentId);
      $comment->delete();

      return redirect("/posts/{$postId}");
     
     // dd(compact(['postId', 'commentId']));
  }
}