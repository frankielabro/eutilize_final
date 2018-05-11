<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('bookversion');
    }

   
    
}
