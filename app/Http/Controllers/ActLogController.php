<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Response;
use DB;


class ActLogController extends Controller
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
    public function activitylog()
    {
        $books = DB::table('book_borrowings')
                     ->join('books', 'book_borrowings.b_itemid', '=', 'books.b_itemid')
                     ->select('books.b_title', 'books.b_itemid', 'book_borrowings.b_date')
                     ->orderBy('book_borrowings.b_date', 'desc')
                     ->paginate(10);

        return view('activitylog', ['books' => $books, 'index' => 1]);
    }

    // public function getActivityLogs()
    // {
    //     $books['data'] = DB::table('book_borrowings')
    //                  ->join('books', 'book_borrowings.b_itemid', '=', 'books.b_itemid')
    //                  ->select('books.b_title', 'books.b_itemid', 'book_borrowings.b_date')
    //                  ->get();

    //     return Response::json($books);
    // }

   
    
}
