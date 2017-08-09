<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;

class DashboardController extends Controller
{
    
    public function departmentEmployee(){

        //$emp = Employee::groupBy('department')->get()->count();
        $emp = Employee::select('department',\DB::raw('count(*) as total'))
        ->groupBy('department')->get();
        return $emp;
        return view('welcome',compact('emp'));
        
        /*foreach($emp as $e){
            echo $e .'<br>';
        }*/
    }
}
