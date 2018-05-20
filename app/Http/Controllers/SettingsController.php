<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SettingsController extends Controller
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
    public function settings()
    {
        return view('settings');
    }

    public function addSemester(Request $request) {

        $validate = $request->validate([

            'datefilter' => 'required'

        ]);

        $dateRange = explode('-', $request->input('datefilter'));

        $sem_desc =  $request->input('semesterSelect');

        if ( $sem_desc == 1 ) {
            $sem_desc = "First Semester";
        }else{
            $sem_desc = "Second Semester";  
        }

        $semester = DB::table('semesters')->insert([

            'sem_desc' => $sem_desc,
            'syr_desc' => $request->input('addSchoolYear'),
            'start_date' => $dateRange[0],
            'end_date' => $dateRange[1]

        ]);

        if($semester == 1) {
            session()->flash('success', 'Semester added');
            return redirect('/settings');
        } else if($semester == 0) {
            session()->flash('error', 'Failed to add semester');
            return redirect('/settings');
        }
    }

    public function semester(){

        $semesters = DB::table('semesters')->get();
        $defaultSem = DB::table('semesters')
                        ->where('is_default', true)
                        ->first();

        return view('settings', ['semesters' => $semesters, 'defaultSem' => $defaultSem]);

    }

    public function deleteSemester(Request $request, $itemId) {
        $deleteSemester = DB::table('semesters')->where('sem_id', $itemId)->delete();

        if($deleteSemester == 1) {
            session()->flash('success', 'Semester Deleted Succesfully');
            return redirect('/settings');
        } else {
            session()->flash('error', 'Encounter Error');
            return redirect('/settings');
        }
    }

    public function getSemester($itemId){

        $semester = DB::table('semesters')->where('sem_id', $itemId)->get();
        return $semester;

    }

    public function updateSemester(Request $request){


        $validate = $request->validate([

            'datefilter' => 'required'

        ]);

        $dateRange = explode('-', $request->input('datefilter'));

        $sem_desc =  $request->input('semester');

        if ( $sem_desc == 1 ) {
            $sem_desc = "First Semester";
        }else{
            $sem_desc = "Second Semester";  
        }

        $updateSemester = DB::table('semesters')
            ->where('sem_id', $request->input('item_id'))
            ->update([
                'sem_desc' => $sem_desc,
                'syr_desc' => $request->input('schoolyear')  ,
                'start_date' => $dateRange[0],
                'end_date' => $dateRange[1]
            ]);

        if($updateSemester == 1) {
            session()->flash('success', 'The semester has been updated');
            return redirect('/settings');
        } else {
            session()->flash('error', 'The semester has not been updated');
            return redirect('/settings')->withInput();
        } 

    }
    
}
