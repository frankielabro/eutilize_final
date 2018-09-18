<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
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

        $distinctbooks = DB::table('book_borrowings')
                    ->join('books', 'book_borrowings.b_itemid', '=', 'books.b_itemid')
                    ->select('books.*', 'book_borrowings.b_itemid')
                    ->distinct(['b_itemid'])
                    ->get();

        $books = array();


        $semester_default = DB::table('semesters')->where('is_default',1)->first();

        foreach ($distinctbooks as $distinctbook) {
            $list['book_itemid'] = $distinctbook->b_itemid;
            $list['book_isbnid'] = $distinctbook->b_isbn;
            $list['book_title'] = $distinctbook->b_title;
            $list['book_category'] = $this->getcategory($distinctbook->bc_id);
            $list['book_edition'] = $distinctbook->b_edition;
            $list['countbookid'] = $this->countbookid($distinctbook->b_itemid , $semester_default->sem_id);
            $books[] = (object)$list;
        }

        $semesters = DB::table('semesters')->get();

        return view('summaryreport', ['books' => $books, 'semesters' => $semesters, 'index' => 1]);

    }

    public function filtersummaryreport(Request $request){

        $distinctbooks = DB::table('book_borrowings')
                        ->join('books', 'book_borrowings.b_itemid', '=', 'books.b_itemid')
                        ->select('books.*', 'book_borrowings.b_itemid')
                        ->distinct(['b_itemid'])
                        ->get();

        $books = array();

        foreach ($distinctbooks as $distinctbook) {
            $list['book_itemid'] = $distinctbook->b_itemid;
            $list['book_isbnid'] = $distinctbook->b_isbn;
            $list['book_title'] = $distinctbook->b_title;
            $list['book_category'] = $this->getcategory($distinctbook->bc_id);
            $list['book_edition'] = $distinctbook->b_edition;
            $list['countbookid'] = $this->countbookid($distinctbook->b_itemid,$request->input('sem_id'));
            $books[] = (object)$list;
        }

        $semesters = DB::table('semesters')->get();

        return view('summaryreport', ['books' => $books, 'semesters' => $semesters, 'index' => 1]);
    }


    public function countbookid($b_itemid , $sem_id){

        $browser_total_raw = DB::raw('count(*) as total');

        $count_id = DB::table('book_borrowings')
                     ->select($browser_total_raw)
                     ->where('b_itemid',$b_itemid)
                     ->where('semester_id','=',$sem_id)
                     ->pluck('total')
                     ->first();

        return $count_id;

    }

    public function getcategory($bc_id){

        $getcategory = DB::table('book_categories')
                     ->select('bc_desc')
                     ->where('bc_id',$bc_id)
                     ->first();

        return $getcategory->bc_desc;

    }


    public function getMean($sum, $numRows) {
        return ($sum/$numRows);
    }

    public function calculateLeastSquares($bookUtils) {

        $meanX = 0;
        $meanY = 0;

        foreach ($bookUtils as $row) {
            $meanX += $row->sem_id;
            $meanY += $row->b_avrutil;
        }

        $meanX = $this->getMean($meanX, count($bookUtils));
        $meanY = $this->getMean($meanY, count($bookUtils));

        $meanSqX = 0;
        $leastSqVal = 0;
        $meanXY = 0;
        $xMinusXMean = 0;
        $yMinusYMean = 0;

        foreach ($bookUtils as $row) {
            $xMinusXMean = $row->sem_id - $meanX;
            $meanSqX += pow($xMinusXMean, 2);

            $yMinusYMean = $row->b_avrutil - $meanY;

            $meanXY += $xMinusXMean * $yMinusYMean;
        }


        $slope = $meanXY / $meanSqX;
        $yIntercept = $meanY - $meanX * $slope;

        return [$slope, $yIntercept];

    }

    public function generateBookShortages() {


        $allBooks = DB::table('books')->get();
        $shortages = [];
        $count = 0;

        foreach ($allBooks as $row) {
            $data = $this->ajaxGetSemAveUtilization($row->b_itemid, false);
            
            if ($data['supplyQty'] < $data['predictedQty']) {
                $count++;
                $arr = [
                    'num' => $count,
                    'b_itemid' => $row->b_itemid,
                    'b_title' => $data['book']->b_title,
                    'b_isbn' => $data['book']->b_isbn,
                    'sem_desc' => $data['currentSem']->sem_desc,
                    'syr_desc' => $data['currentSem']->syr_desc,
                    'sem_id' => $data['currentSem']->sem_id,
                    'predicted_qty' => $data['predictedQty'],
                    'supply_qty' => $data['supplyQty'],
                    'shortage_percentage' => round(abs($data['supplyQty']-$data['predictedQty'])/$data['predictedQty'], 2)
                ];

                array_push($shortages, $arr);
            }
        }

        return view('shortages')->with(['shortages' => $shortages]);
    }

    public function ajaxGetSemAveUtilization ($itemId, $isAjax = true) {

        $bookUtils = DB::table('semester_avr_utils')
                        ->join('semesters', 'semesters.sem_id', '=', 'semester_avr_utils.sem_id')
                        ->where('b_itemid', $itemId)
                        ->get();

        $coordinates = [];

        foreach ($bookUtils as $row) {
            $coordinates[] = [$row->sem_id, $row->b_avrutil]; 
        }

        $semesters = DB::table('semesters')->get();
        $currentSem = DB::table('semesters')->orderBy('sem_id', 'DESC')->first();
        $book = DB::table('books')
            ->join('author_books', 'author_books.b_itemid', '=', 'books.b_itemid')
            ->join('authors', 'author_books.a_id', '=', 'authors.a_id')
            ->select('books.*', 'author_books.*', 'authors.*')
            ->where('books.b_itemid', '=',$itemId)
            ->first();

        $formulaVars = $this->calculateLeastSquares($bookUtils);

        $x = ($currentSem->sem_id + 1);
        $schoolDays = 110;

        // y = mx + b
        $predictedQty = round( ( ($formulaVars[0] * $x) + $formulaVars[1])/110, 4);
        // $supplyQty = $book->b_qty * $schoolDays;

        $data = [
            'predictedQty' => round($predictedQty, 0),
            'supplyQty' => $book->b_qty,
            'currentSem' => $currentSem,
            'book' => $book,
            'coordinates' => $coordinates,
            'bookUtils' => $bookUtils,
            'semesters' => $semesters
        ];

        return ($isAjax)? Response::json($data): $data;
    }

    public function getBookUtilizationById($itemId) {
        return view('lineargraph')->with(['itemId' => $itemId]);
    }


    public function ajaxGenerateBookUtilization () {

        $defaultSem = $this->getDefaultSemester();

        $book_borrowings = DB::table('book_borrowings')
                            ->where('semester_id', $defaultSem->sem_id)
                            ->get();

        $count_books = [];

        foreach ($book_borrowings as $book) {
            if (!in_array($book->b_itemid, array_keys($count_books))) {
                $count_books[$book->b_itemid] = 1;
            } else {
                $count_books[$book->b_itemid]++;                
            }
        }

        try {

            DB::beginTransaction();

            foreach($count_books as $key => $count) {

                $semAvr = DB::table('semester_avr_utils')
                            ->where('b_itemid', $key)
                            ->where('sem_id', $defaultSem->sem_id)
                            ->first();

                if ($semAvr !== null) {
                    DB::table('semester_avr_utils')
                        ->where('id', $semAvr->id)
                        ->update(['b_avrutil' => $count]);

                } else {
                    $data = [
                        'b_avrutil' => $count,
                        'sem_id' => $defaultSem->sem_id,
                        'b_itemid' => $key
                    ];

                    DB::table('semester_avr_utils')
                        ->insert($data);
                }

            }

            DB::commit();
        } catch(\Exception $e) {
            $this->log("rollback sya dzai");
            DB::rollback();
        }

        return Response::json(true);
    }
   
    
}