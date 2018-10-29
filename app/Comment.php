<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable= ['author', 'text'];  //guarded polja koja ne mozemo da menjamo, a fileble je za polja koja mogu da se menjaju, koristimo jedno ili drugo posto se medjusobno iskljucuju
    const VALIDATION_RULES =  [
        'author'=>'required | max:10 | string',
        'text'=>'required | min:25',
    ];

    public function post ()
    {
        return $this->belongsTo(Post::class);
    }

}
