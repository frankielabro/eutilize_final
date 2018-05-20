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
        return view('summaryreport');
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
            
            if ($data['supplyQty'] <= $data['predictedQty']) {
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
        $book = DB::table('books')->where('b_itemid', $itemId)->first();

        $formulaVars = $this->calculateLeastSquares($bookUtils);

        $x = ($currentSem->sem_id + 1);
        $schoolDays = 110;

        // y = mx + b
        $predictedQty = round(($formulaVars[0] * $x) + $formulaVars[1], 4);
        $supplyQty = $book->b_qty * $schoolDays;

        $data = [
            'predictedQty' => round($predictedQty, 0),
            'supplyQty' => $supplyQty,
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
   
    
}