<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
   public function selectReportMonth(){
       $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
       return view('Report.select-report-month',compact('months'));

   }

    public function selectDate(){
        $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        return view('Report.my-report-month',compact('months'));

    }

   public function reports(Request $request){
       $reports = Report::where('month',$request->month)->where('year',$request->year)->paginate(20);
       $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
       return view('Report.reports',compact('reports','months'));
   }


   public function createReport(Request $request){
       $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
       return view('Report.create-report',compact('months'));
   }

   public function createThis(Request $request){
       Report::updateOrCreate(['user_id'=>Auth::user()->id, 'month'=>$request->month, 'year'=>$request->year],[
           "user_id" => Auth::user()->id,
           "month" => $request->month,
           "year" => $request->year,
           "content" => $request->contents,
           "referTo" => ""
       ]);

       return redirect('/');


   }

}
