<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\History;
use App\User;
use App\Employee;


class HistoryController extends Controller
{
    public function storeHistory($id){
        $employee = Employee::where('user_id',$id)->get()->first();
        return $employee;
    }
}
