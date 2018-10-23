<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
  public function store ($id)
  {
      $post= Post::findOrFail($id);

      $this->validate(
        request(),
       Comment::VALIDATION_RULES
    );


      $post->comments()->create(
          request()->all()
      );
      return redirect("/posts/{$id}"); // moraju dupli navodnici a moze i bez viticastih oko id 
      //return redirect('/posts/' .$id);  // moze i ovako da se napise ovo gore
  }  
}
