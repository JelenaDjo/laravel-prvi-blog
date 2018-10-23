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
        $post = Post::findOrFail($id);

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
            [
                'title'=>'required',
                'body'=>'required | min:25',
                'published'=>'required'
            ]
        );
        Post::create(request()->all());
            return redirect('/posts');
    }
}
