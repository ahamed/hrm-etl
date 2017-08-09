<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use \Carbon\CarbonInterval;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;


use App\User;
use App\Employee;
use App\Salary;
use App\Occasion;
use App\Configuration;
use App\Tracker;

use Auth;

use Hash;
use Session;

class ConfigController extends Controller
{


    public function __construct(HasherContract $hasher){
        $this->hasher = $hasher;
    }

    public function hollyDay(){
        $hollyDays = Occasion::all();
        
        if(sizeof($hollyDays) == null){
            $occasions = [
                            [
                                'title' => 'Shaheed Day & International Mother Language Day',
                                'start' => Carbon::parse(Carbon::now()->year.'-02-21')->format('Y-m-d'),
                                'end'   => Carbon::parse(Carbon::now()->year.'-02-21')->format('Y-m-d'),
                                'fixed' =>1
                            ],
                            [
                                'title' => 'Independence and National day',
                                'start' => Carbon::parse(Carbon::now()->year.'-03-26')->format('Y-m-d'),
                                'end'   => Carbon::parse(Carbon::now()->year.'-03-26')->format('Y-m-d'),
                                'fixed' =>1
                            ],
                            [
                                'title' => 'Bangla Nababarsha',
                                'start' => Carbon::parse(Carbon::now()->year.'-04-14')->format('Y-m-d'),
                                'end'   => Carbon::parse(Carbon::now()->year.'-04-14')->format('Y-m-d'),
                                'fixed' =>0
                            ],
                            [
                                'title' => 'May Day',
                                'start' => Carbon::parse(Carbon::now()->year.'-05-01')->format('Y-m-d'),
                                'end'   => Carbon::parse(Carbon::now()->year.'-05-01')->format('Y-m-d'),
                                'fixed' =>1
                            ],
                            [
                                'title' => '*Buddha Purnima / Vesak (Baishakhi Purnima)',
                                'start' => Carbon::now()->format('Y-m-d'),
                                'end'   => Carbon::now()->format('Y-m-d'),
                                'fixed' =>0
                            ],
                            [
                                'title' => '*Shab-E-Barat',
                                'start' => Carbon::now()->format('Y-m-d'),
                                'end'   => Carbon::now()->format('Y-m-d'),
                                'fixed' =>0
                            ],
                            [
                                'title' => '*Night of Destiny / Laylat- al-Qadr',
                                'start' => Carbon::now()->format('Y-m-d'),
                                'end'   => Carbon::now()->format('Y-m-d'),
                                'fixed' =>0
                            ],
                            [
                                'title' => '*Eid-ul-Fitr / Festival of Fastbreaking',
                                'start' => Carbon::now()->format('Y-m-d'),
                                'end'   => Carbon::now()->format('Y-m-d'),
                                'fixed' =>0
                            ],
                            [
                                'title' => 'National Mourning Day',
                                'start' => Carbon::parse(Carbon::now()->year.'-08-15')->format('Y-m-d'),
                                'end'   => Carbon::parse(Carbon::now()->year.'-08-15')->format('Y-m-d'),
                                'fixed' =>1
                            ],
                            [
                                'title' => '*Eid-ul-Adha / Festival of Sacrifice',
                                'start' => Carbon::now()->format('Y-m-d'),
                                'end'   => Carbon::now()->format('Y-m-d'),
                                'fixed' =>0
                            ],
                            [
                                'title' => '*Durga Puja (Bijoya Dashami)',
                                'start' => Carbon::now()->format('Y-m-d'),
                                'end'   => Carbon::now()->format('Y-m-d'),
                                'fixed' =>0
                            ],
                            [
                                'title' => '*Eid-e-Miladun-Nabi/ Birth of the Prophet',
                                'start' => Carbon::now()->format('Y-m-d'),
                                'end'   => Carbon::now()->format('Y-m-d'),
                                'fixed' =>0
                            ],
                            [
                                'title' => 'Victory Day',
                                'start' => Carbon::parse(Carbon::now()->year.'-12-16')->format('Y-m-d'),
                                'end'   => Carbon::parse(Carbon::now()->year.'-12-16')->format('Y-m-d'),
                                'fixed' =>1
                            ],
                            [
                                'title' => 'Christmas Day',
                                'start' => Carbon::parse(Carbon::now()->year.'-12-25')->format('Y-m-d'),
                                'end'   => Carbon::parse(Carbon::now()->year.'-12-25')->format('Y-m-d'),
                                'fixed' =>1
                            ]     
                        ];

            foreach($occasions as $occ){
            

            $start = Carbon::parse($occ['start']);
            $end = Carbon::parse($occ['end']);
            $sm = $start->month;
            $em = $end->month;
            $DayOfMonth = [31,$start->isLeapYear() ? 29:28,31,30,31,30,31,31,30,31,30,31];



            if(($em - $sm) > 0){
                $vacation = new Occasion;
                $vacation->events = $occ['title'];
                $vacation->start = $start;
                $vacation->end = Carbon::parse($start->year.'-'.$sm.'-'.$DayOfMonth[$sm-1]);
                $vacation->days = Carbon::parse($start->year.'-'.$sm.'-'.$DayOfMonth[$sm-1])->diffInDays($start) + 1;
                $vacation->fixed = $occ['fixed'];
                $vacation->type = 1;
                $vacation->save();

                $vacation = new Occasion;
                $vacation->events = $occ['title'];
                $vacation->start = Carbon::parse($start->year.'-'.$em.'-01');
                $vacation->end = $end;
                $vacation->days = $end->diffInDays(Carbon::parse($start->year.'-'.$em.'-01'))+1;
                $vacation->fixed = $occ['fixed'];
                $vacation->type = 1;
                $vacation->save();

            }else{
                $vacation = new Occasion;
                $vacation->events = $occ['title'];
                $vacation->start = $start;
                $vacation->end = $end;
                $vacation->days = Carbon::parse($end)->diffInDays(Carbon::parse($start))+1;

                $vacation->fixed = $occ['fixed'];
                $vacation->type = 1;
                $vacation->save();
            }

        }

        $year = Carbon::now()->year;
        $begin = Carbon::parse( $year.'-01-01' );
        $end = Carbon::parse( $year.'-12-31' );

        $interval = CarbonInterval::createFromDateString('1 day');
        $period = new \DatePeriod($begin, $interval, $end);
        
        $dates = Occasion::all();



        foreach($period as $dt){
            if($dt->isFriday()){
                echo "Friday<br>";
                $flag = 0;
             foreach($dates as $date){
                
                    if( Carbon::parse($date->start) <= Carbon::parse($dt) && Carbon::parse($date->end) >= Carbon::parse($dt) ){
                        //return Carbon::parse($dt);
                        $flag = 1;
                        break;
                    }   
                }
                if($flag == 0){
                    $vacation = new Occasion;
                    $vacation->events = "Friday";
                    $vacation->start = $dt->format('Y-m-d');
                    $vacation->end = $dt->format('Y-m-d');
                    $vacation->days = 1;
                    $vacation->fixed = 0;
                    $vacation->type = 0;
                    $vacation->save();
                }
                
               
            }
            
        }

        return redirect('/');
        }else{
            Occasion::truncate();
            return redirect('/config-vacation');
        }

        
    }


    public function dateConfig(Request $request){
        $allOccasions = Occasion::where('type',1)->get();

        return view('configuration.config',compact('allOccasions'));
    }


    public function saveDate(Request $request){
        $vacationData = Occasion::where('type',1)->get();
        

        foreach($request->start as $key=>$st){
            if($key <= sizeof($vacationData)-1){
                //update

                $start = Carbon::parse($request->start[$key]);
                $end = Carbon::parse($request->end[$key]);
                $sm = $start->month;
                $em = $end->month;
                $DayOfMonth = [31,$start->isLeapYear() ? 29:28,31,30,31,30,31,31,30,31,30,31];


                if(($em - $sm) > 0){

                    $vacationData[$key]->start = $start;
                    $vacationData[$key]->end = Carbon::parse($start->year.'-'.$sm.'-'.$DayOfMonth[$sm-1]);
                    $vacationData[$key]->days = Carbon::parse($start->year.'-'.$sm.'-'.$DayOfMonth[$sm-1])->diffInDays($start) + 1;
                    $vacationData[$key]->type = 1;
                    $vacationData[$key]->save();

                    $vacation = new Occasion;
                    $vacation->events = $request->events[$key];
                    $vacation->start = Carbon::parse($start->year.'-'.$em.'-01');
                    $vacation->end = $end;
                    $vacation->days = $end->diffInDays(Carbon::parse($start->year.'-'.$em.'-01'))+1;
                    $vacation->fixed = 0;
                    $vacation->type = 1;
                    $vacation->save();

                }else{
                    $vacationData[$key]->start = Carbon::parse($request->start[$key]);
                    $vacationData[$key]->end = Carbon::parse($request->end[$key]);
                    $vacationData[$key]->days = Carbon::parse($request->end[$key])->diffInDays(Carbon::parse($request->start[$key])) + 1;
                    $vacationData[$key]->type = 1;
                    $vacationData[$key]->save();
                }


                

            }else{
                //insert
                $start = Carbon::parse($request->start[$key]);
                $end = Carbon::parse($request->end[$key]);
                $sm = $start->month;
                $em = $end->month;
                $DayOfMonth = [31,$start->isLeapYear() ? 29:28,31,30,31,30,31,31,30,31,30,31];


                if(($em - $sm) > 0){
                    $vacation = new Occasion;
                    $vacation->events = $request->events[$key];
                    $vacation->start = $start;
                    $vacation->end = Carbon::parse($start->year.'-'.$sm.'-'.$DayOfMonth[$sm-1]);
                    $vacation->days = Carbon::parse($start->year.'-'.$sm.'-'.$DayOfMonth[$sm-1])->diffInDays($start) + 1;
                    $vacation->type = 1;
                    $vacation->save();

                    $vacation = new Occasion;
                    $vacation->events = $request->events[$key];
                    $vacation->start = Carbon::parse($start->year.'-'.$em.'-01');
                    $vacation->end = $end;
                    $vacation->days = $end->diffInDays(Carbon::parse($start->year.'-'.$em.'-01'))+1;
                    $vacation->fixed = 0;
                    $vacation->type = 1;
                    $vacation->save();

                }else{
                    $vacation = new Occasion;
                    $vacation->events = $request->events[$key];
                    $vacation->start = Carbon::parse($request->start[$key]);
                    $vacation->end = Carbon::parse($request->end[$key]);
                    $vacation->days = Carbon::parse($request->end[$key])->diffInDays(Carbon::parse($request->start[$key])) + 1;
                    $vacation->fixed = 0;
                    $vacation->type = 1;
                    $vacation->save();
                }

                

            }
        }
        return redirect()->back();
    }


    


    /*this should be calculated first day of every month*/

    public function countMonthlyLeave(){
        $month = Carbon::now()->month;
        $year  = Carbon::now()->year;
        $leaves = Occasion::whereYear('start','=',$year)
        ->whereMonth('start','=',$month)->get()->sum('days');
        
        
        $users = User::where('role','2')->get();
        foreach($users as $key=>$user){

            Configuration::firstOrCreate([
                'user_id' => $user->id,
                'year' => $year,
                'month' => $month,
                'leave_allowed' => $leaves
                ]);
            
            /*$config = new Configuration;
            $config->user_id = $user->id;
            $config->year = $year;
            $config->month = $month;
            $config->leave_allowed = $leaves;
            $config->save();*/    
        }
        return redirect()->back();

    }


    public function getEntryTime(){

        $employees = User::paginate(20);
        return view('configuration.entry-time',compact('employees'));
    }


    public function setEntryTime(Request $request){
        $users = User::all();
        foreach($users as $key => $user){
            $needToUp = User::where('id',$user->id)->get()->first();
            $needToUp->entry_time = $request->entry_time[$key];
            $needToUp->save();
        }

        return redirect()->back();
    }


    public function changePassword(){
        return view('auth.change-password');
    }

    public function bodlao(Request $request){
        //$password = bcrypt($request->cpassword);
        //return $password;
       // echo $password . "<br>";
        $users = User::where('id',Auth::user()->id)->get()->first();
       // echo $users->password;
        
        if($this->hasher->check($request->cpassword, $users->password)){
            if($request->npassword == $request->cnpassword){
                $users->password = bcrypt($request->npassword);
                $users->save();
               // Sesssion::unset('generic_error');
                return redirect('/');
            }
        }else{
            Session::put('generic_error','1');
            return redirect()->back();
        }

     
       

    }


    public function getLateAbsence(){
        /*$users = Configuration::join('users','configurations.user_id','=','users.id')
            ->where('configurations.month','=',Carbon::now()->month)
            ->where('configurations.year','=',Carbon::now()->year)
            ->select('configurations.*','users.name')
            ->get();*/
        $users = Employee::where('enable',1)->get();
        return view('configuration.late-and-absence',compact('users'));
    }

    public function setLateAbsence(Request $request){
        //return $request->all();
        if($request->has('month')){
            $month = $request->month;
        }else{
            $month = Carbon::now()->month;
        }

        if($request->has('year')){
            $year = $request->year;
        }else{
            $year = Carbon::now()->year;
        }



        $leaves = Occasion::whereYear('start','=',$year)
            ->whereMonth('start','=',$month)->get()->sum('days');

        foreach($request->user_id as $key=>$user){
            Configuration::updateOrCreate(["user_id" => $user, "month" => $month, "year" => $year],[
               "absent" => $request->absent[$key],
                "late_count" => $request->late_count[$key],
                "month" => $month,
                "year" => $year,
                "leave_allowed" => $leaves
            ]);


            /*$config = Configuration::where('user_id',$user)->first();
            $config->absent = $request->absent[$key];
            $config->late_count = $request->late_count[$key];
            $config->month = Carbon::now()->month;
            $config->year = Carbon::now()->year;
            $config->save();*/
        }

        if($request->has('month') && $request->has('year')){
            return redirect('make-salary-sheet?month='.$request->month.'&year='.$request->year);
        }else{
            return redirect('/');
        }

    }

    
}
