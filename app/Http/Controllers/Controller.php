<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function log($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    
    public function setDefaultSemester() {
        $currentDate = date('Y-m-d');

        try {
            DB::beginTransaction();
                
                DB::table('semesters')
                    ->where('start_date', '<', $currentDate)
                    ->where('end_date', '>=', $currentDate)
                    ->update(['is_default' => true]);

            DB::commit();
        } catch(Exception $e) {
            DB::rollback();
            $this->log($e);
        }

    }

    public function getDefaultSemester() {
        $defaultSem = DB::table('semesters')
                        ->where('is_default', true)
                        ->first();

        return ($defaultSem === null)? false: $defaultSem;
    }

}
