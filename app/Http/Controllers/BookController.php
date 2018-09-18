<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BookController extends Controller
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
    public function book()
    {
        $books = array();
        $empty = array();

        $booksQuery = DB::table('books')
            ->join('book_categories', 'books.bc_id', '=', 'book_categories.bc_id')
            // ->select('*', 'books.b')
            ->get();

        for($i=0; count($booksQuery) > $i; $i++) {

            $books[] = (object) array(
                'bookNum' => $i+1,
                'itemId' => $booksQuery[$i]->b_itemid,
                'isbn' => $booksQuery[$i]->b_isbn,
                'bcId' => $booksQuery[$i]->bc_id,
                'bRfid' => $booksQuery[$i]->b_rfid,
                'title' => $booksQuery[$i]->b_title,
                'quantity' => $booksQuery[$i]->b_qty,
                'edition' => $booksQuery[$i]->b_edition,
                'category' => $booksQuery[$i]->bc_desc
            );

        }

        return view('book')->with(['bookslist' => $books, 'isUpdated' => 'notUpdated']);

    }


    public function addBook(Request $request){

         $books[] = (object) array(
                'bookNum' => $i+1,
                'itemId' => $booksQuery[$i]->b_itemid,
                'isbn' => $booksQuery[$i]->b_isbn,
                'bcId' => $booksQuery[$i]->bc_id,
                'bRfid' => $booksQuery[$i]->b_rfid,
                'title' => $booksQuery[$i]->b_title,
                'quantity' => $booksQuery[$i]->b_qty,
                'edition' => $booksQuery[$i]->b_edition,
                'category' => $booksQuery[$i]->bc_desc
            );

        $semester = DB::table('books')->insert([

            'b_itemid' => $sem_desc,
            'b_isbn' => $request->input('addSchoolYear'),
            'bc_id' => $dateRange[0],
            'b_rfid' => 0000,
            'b_title' => $dateRange[0],
            'b_edition' => $dateRange[0],
            'bc_id' => $dateRange[0],
            'b_qty' => $dateRange[0],

        ]);

    }

    public function getBook($itemId) {

        $book = DB::table('books')->where('b_itemid', $itemId)->get();

        return $book;
    }

    public function updateBook(Request $request) {

        $updateBook = DB::table('books')
            ->where('b_itemid', $request->input('itemIdHiddenInput'))
            ->update([
                'b_itemid' => $request->input('itemIdInputName'),
                'b_title' => $request->input('titleInputName'),
                'b_edition' => $request->input('versionInputName'),
                'b_qty' => $request->input('quantityInputName'),
                'bc_id' => $request->input('bookSelectName'),
            ]);

            $books = array();
            $empty = array();
            $booksQuery = DB::table('books')
                ->join('book_categories', 'books.bc_id', '=', 'book_categories.bc_id')
                ->select('books.*', 'book_categories.bc_desc')
                ->get();

            for($i=0; count($booksQuery) > $i; $i++) {
                $books[] = (object) array(
                    'bookNum' => $i+1,
                    'itemId' => $booksQuery[$i]->b_itemid,
                    'isbn' => $booksQuery[$i]->b_isbn,
                    'bcId' => $booksQuery[$i]->bc_id,
                    'bRfid' => $booksQuery[$i]->b_rfid,
                    'title' => $booksQuery[$i]->b_title,
                    'edition' => $booksQuery[$i]->b_edition,
                    'quantity' => $booksQuery[$i]->b_qty,
                    'category' => $booksQuery[$i]->bc_desc
                );
            }

            if($updateBook == 1) {
                session()->flash('success', 'The book has been updated');
                return redirect('/book');
            } else {
                session()->flash('error', 'The book has not been updated');
                return redirect('/book')->withInput();
            } 

        

    }

    public function deleteBook(Request $request, $itemId) {
        $deleteBook = DB::table('books')->where('b_itemid', $itemId)->delete();

        if($deleteBook == 1) {
            session()->flash('success', 'The book has been deleted');
            return redirect('/book');
        } else {
            session()->flash('error', 'The book has not been deleted');
            return redirect('/book');
        }

    }
   
    
}
