<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'published'

    ];

    public static function getPublishedPosts() // ova funkcija vraca samo one postove koji su published, oni koji nemaju cekirano published nece se videti
    {
        return Post::where('published', true)->get();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
