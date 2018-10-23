<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded= ['id'];  //polja koja ne mozemo da menjamo, a fileble je za polja koja mogu da se menjaju, koristimo jedno ili drugo posto se medjusobno iskljucuju

    public function post ()
    {
        return $this->belongsTo(Post::class);
    }

}
