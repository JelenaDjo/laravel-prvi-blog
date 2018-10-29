
@extends('layouts.master')

@section('title')
    All posts
@endsection

@section('content')
<a href="/posts/create">
    <button type="submit" class="btn btn-primary"> Create New Post </button>
</a>
    <h1>Posts</h1>

    <ul>
        @foreach($user->posts as $post)
            <li>
                <div class="blog-post"> 
                     <p>Written by: {{$post->author->name}} </p>
                     
                    <h2 class="blog-post-title"> 
                    
                     <a href="/posts/{{$post->id}}">
                     {{ $post->title}}
                     </a>

                     </h2>
                    <p> {{ $post->body}}</p>
                </div><!-- /.blog-post -->
            </li>

           
        @endforeach
    </ul>

@endsection


