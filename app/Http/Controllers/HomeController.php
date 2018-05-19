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
        $book = DB::table('author_books')
                     ->join('books', 'author_books.b_itemid', '=', 'books.b_itemid')
                     ->join('authors', 'author_books.a_id', '=', 'authors.a_id')
                     ->select('books.b_title', 'books.b_edition', 'authors.a_name', 'books.b_itemid')
                     ->where('b_title', $request['title'])
                     ->first();
        return Response::json($book);
   }
    
   public function saveBorrowBook(Request $request)
   {
        $validatedData = $request->validate([
            'book_author' => 'required',
            'book_title' => 'required',
            'book_version' => 'required',
        ]);

        DB::table('book_borrowings')->insert([
            ['b_itemid' => $request['b_itemid'], 'b_date' => date('Y-m-d H:i:s')]
        ]);

        return "success";
   }

   
}
