<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'b_itemId';

    public function bookVersions() {
        return $this->hasMany(BookVersion::class, 'b_itemid', 'b_itemid');
    }

    public function authors() {
    	return $this->belongsToMany(Author::class, 'author_books', 'b_itemid', 'a_id');
    }

    public function latestSearchedVersion() {
    	return $this->bookVersions->last();
    }
}
