<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Response;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *  
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        if (!$this->getDefaultSemester()) {
            $this->setDefaultSemester();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main');
    }
    
   public function search_book_title(Request $request)
   {

        $searchvalue = $request->input('searchvalue');

        $book = DB::table('author_books')
                     ->join('books', 'author_books.b_itemid', '=', 'books.b_itemid')
                     ->join('authors', 'author_books.a_id', '=', 'authors.a_id')
                     ->select('books.b_title', 'books.b_edition', 'authors.a_name', 'books.b_itemid')
                     ->where('b_title','like', '%' .$searchvalue. '%')
                     ->orWhere('a_name','like', '%' .$searchvalue. '%')
                     ->get();

        return Response::json($book);
   }
    
   public function saveBorrowBook(Request $request)
   {    

       $defaultSem = $this->getDefaultSemester();

        DB::table('book_borrowings')->insert([
            ['b_itemid' => $request['b_itemid'], 'b_date' => date('Y-m-d H:i:s'), 'semester_id' => $defaultSem->sem_id]
        ]);

        return Response::json(true);
   }

   
}
