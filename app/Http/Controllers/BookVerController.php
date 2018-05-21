<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BookVerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */



    public function bookversion()
    {
        $books = array();
        $empty = array();

        $booksQuery = DB::select("
                        SELECT a.b_itemid, a.b_title, c.a_name, a.b_edition FROM books a 
                        LEFT JOIN (SELECT author_books.b_itemid, max(a_id) As last_class_id FROM author_books 
                        GROUP BY author_books.b_itemid) b 
                        ON a.b_itemid = b.b_itemid 
                        LEFT JOIN authors c ON c.a_id = b.last_class_id"
                    );


        for($i=0; count($booksQuery) > $i; $i++) {

            $books[] = (object) array(
                'bookNum' => $i+1,
                'itemId' => $booksQuery[$i]->b_itemid,
                'title' => $booksQuery[$i]->b_title,
                'author' => $booksQuery[$i]->a_name,
                'edition' => $booksQuery[$i]->b_edition,
            );

        }

        return view('bookversion')->with(['bookslist' => $books, 'isUpdated' => 'notUpdated']);

    }
   
    
}
