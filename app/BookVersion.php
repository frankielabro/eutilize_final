<?php
/**
 * Created by PhpStorm.
 * User: cjbm2994
 * Date: 22/05/2018
 * Time: 2:04 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookVersion extends Model {

    protected $table = 'book_versions';

    public function book() {
        return $this->belongsTo(Book::class, 'b_itemid', 'b_itemid');
    }
}