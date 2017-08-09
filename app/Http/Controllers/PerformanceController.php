<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Performance;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PerformanceController extends Controller
{

    public function create()
    {
        $employees = Employee::all();

        $months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        return view('performance.create',compact('employees','months'));
    }

    public function store(Request $request){





        Performance::updateOrCreate([
            "user_id" => $request->emp,
            'month' => $request->month,
            'year' => $request->year
        ],[
            'user_id' => $request->emp,
            'month' => $request->month,
            'year' => $request->year,
            'wfp' => $request->wfp,
            'qw' => $request->qw,
            'communication' => $request->communication,
            'creativity' => $request->creativity,
            'honesty' => $request->honesty,
            'attitute' => $request->attitute,
            'cr' => $request->cr,
            'ts' => $request->ts,
            'la' => $request->la,
            'leave' => $request->leave,
            'comment' => $request->comment


        ]);

        return redirect()->back();
    }

    public function getPerformance($user, $month, $year){
        $performance = Performance::where('user_id',$user)
            ->where('month',$month)
            ->where('year',$year)
            ->get()
            ->first();
        return $performance;
        return \Response::json($performance);
    }

    public function myPerformance(){
        return view('performance.my-performance');
    }

}
