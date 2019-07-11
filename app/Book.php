<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres');
    }
    protected $fillable = ['title', 'author', 'year'];
}
