<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\User;
use App\Application;
use App\Email;
use App\Employee;
use App\Configuration;
use App\Resource;
use App\Notice;

use Mail;


use Auth;

use \Carbon\Carbon;

class InitController extends Controller
{
    

    public function setData(){
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $adminCount = Application::where('receiver_id',Auth::user()->id)->where('status','pending')->get()->count();
        $userCount = Application::where('sender_id',Auth::user()->id)->where('status','pending')->get()->count();

        $inbox = Email::where('receiver_id',Auth::user()->id)
        ->where('status','0')
        ->get()->count();
        $emp = Employee::select('department',\DB::raw('count(*) as total'))
        ->groupBy('department')->get();


        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        if($month == 1){
            $month = 12;
            $year = $year -1;
        }else{
            $month = $month -1;
        }

        $attends = Configuration::join('employees','employees.user_id','=','configurations.user_id')->where('configurations.month','=',$month)->where('configurations.year','=',$year)->orderBy('employees.user_id','ASC')->get();
        
        
        $start = Carbon::now();
        $DayOfMonth = [31,$start->isLeapYear() ? 29:28,31,30,31,30,31,31,30,31,30,31];
        ///return $DayOfMonth;
        //return $attends2->count();
        /*foreach($attends2 as $attend){
            echo "User: ".$attend->user_id."->Days :".$DayOfMonth[$attend->month-1]."->"."Ab:  ".$attend->absent."->"."La: ".$attend->leave_allowed."->". (($DayOfMonth[($attend->month-1)] - $attend->absent) * 100 ) / ($DayOfMonth[($attend->month-1)] - $attend->leave_allowed) . "<br>";
        }

       

return 0;*/
        //return $attends2;

        

        $documents = Resource::orderBy('created_at','DESC')->paginate(5);
        $notices = Notice::orderBy('created_at','DESC')->paginate(5);

        Session::put('inbox',$inbox);
        Session::put('user_sentbox_count',$userCount);
        Session::put('admin_inbox_count',$adminCount);

        return view('welcome',compact('emp','attends','DayOfMonth','documents','notices'));


    }
    public function testMail(){
        /*try{
            Mail::raw('this is message content',function($message){
                $message->from('hrm.ezzetech@gmail.com','Ezzetech');
                $message->to('sajeeb07ahamed@yahoo.com');
            });

            echo "Okay";
        
        }catch(Exception $e){
            echo $e->getMessage();
        }*/

        $m = mail('sajeeb07ahamed@yahoo.com','no subject','this is content of the message');
       /* $data = [];
        Mail::send('emails.user-info',$data,function($message){
            $message->from('hrm.ezzetech@gmail.com','HRM-ETL');
            $message->to('sajeeb07ahamed@yahoo.com');
        });*/


        return redirect('/');
        
    }
}
