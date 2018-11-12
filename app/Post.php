<?php

namespace App;
use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        'id'

    ];
    const VALIDATION_RULES = [
        'title'=>'required',
        'body'=>'required | min:25',
        'published'=>'required'
    ];

    public static function getPublishedPosts() // ova funkcija vraca samo one postove koji su published, oni koji nemaju cekirano published nece se videti
    {
        return Post::where('published', true)->get();
    }

    public function author ()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
