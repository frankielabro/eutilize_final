<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'b_itemId';

    public function bookVersions() {
        return $this->hasMany(BookVersion::class, 'b_itemId', b_itemId);
    }
}
