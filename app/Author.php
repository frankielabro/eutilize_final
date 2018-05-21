<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $primaryKey = 'a_id';

    public function books() {
    	return $this->belongsToMany(Author::class, 'author_books','a_id', 'b_itemid');
    }
}
