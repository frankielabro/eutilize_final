<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SumReportController extends Controller
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
    public function summaryreport()
    {
        return view('summaryreport');
    }


    public function getBookUtilizationById ($itemId) {

        
            
        $books = DB::table('book_borrowings')
                    ->where('b_itemId', $itemId)
                    ->get();

        $this->log($books);
        return view('lineargraph');
    }
   
    
}
