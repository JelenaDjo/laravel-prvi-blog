<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::getPublishedPosts();

        return view('posts.index', ['posts'=>$posts]);
    }

    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id); // with je eagrloading, suprotno od lasyloading
        //dd($post); // ovo znaci da se prekine program u tom prenutku i prikaze sta se tad tu nalazi

        return view('posts.show', ['post'=>$post]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $this->validate(
            request(),

           Post::VALIDATION_RULES
        );

        //dd(auth()->user)
        
        Post::create(
            array_merge( 
            request()->all(),
            [
                'author_id'=>auth()->user()->id
            ]
            )
        );
            return redirect('/posts');
    }
}
