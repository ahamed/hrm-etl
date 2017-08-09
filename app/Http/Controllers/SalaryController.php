<?php

namespace App\Http\Controllers;

use App\Provident;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use App\User;
use App\Salary;
use App\Employee;
use App\Loan;
use App\Occasion;
use App\Configuration;
use DB;

use \Carbon\Carbon;

class SalaryController extends Controller
{
    

    public function selectDate(){
        
        $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        return view('salary.select-date',compact('months'));
    }

    

    public function salary(Request $request,$id){
        $salary = Salary::where('id',$id)->get()->first();
        $salary->basic = $request->basic;
        $salary->bonus = $request->bonus;
        $salary->adjustment = $request->adjustment;
        $salary->prev_loan = $request->prev_loan;
        $salary->new_loan = $request->new_loan;
        $salary->adjust_loan = $request->adjust_loan;
        $salary->last_loan = $request->last_loan;
        $salary->working_day = 30;
        $salary->allowed_leave = $request->allowed_leave;
        $salary->save();
        return redirect('select-user');
    }

    public function individualSalary($id=""){
        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

    }

    public function allSalary(){


        return view('salary.all-salary');
    }

    public function getEmployee(Request $request){
        $salary = new Salary;
        $salary->user_id = $request->user_id;
        $salary->month = $request->month;
        $salary->year = $request->year;
        $salary->save();
        
        return redirect('go-salary/'.$request->user_id);
    }

    public function goSalary($id){
        $getSalary = Salary::where('user_id',$id)->orderBy('created_at','DESC')->get();
        if(!empty($getSalary[1])){
            $salary = $getSalary[1];
        }else{
            $salary = $getSalary[0];    
        }
        $current_id = $getSalary[0]->id;

        return view('salary.add-salary',compact('salary','current_id'));
    }

    public function sheetSelection(){
         $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
         return view('salary.sheet-selection',compact('months'));
    }

    public function salaryData(Request $request){

        /*$salaryData = Salary::join('employees','employees.user_id','=','salaries.user_id')
            ->where('month',$request->month)->where('year',$request->year)->paginate(20);*/

        $valid_sheet = Salary::where('month',$request->month)
            ->where('year',$request->year)->get();
        if(count($valid_sheet) <= 0){
            return back()->with('msg','No data found! please first make a salary sheet for this specific date.');
        }

        $salaryData = Salary::where('month',$request->month)->where('year', $request->year)->paginate(20);
        foreach($salaryData as $key => $d){
            $gross = $d->basic + $d->bonus + $d->home_allowance + $d->health_allowance + $d->sales_profit +
                $d->profit_share + $d->lunch + $d->other_earnings;
            $d->gross = $gross;

            $deductions = $d->loan + $d->provident_fund + $d->other_deductions + $d->leave_taken + $d->late_count;
            $d->deductions = $deductions;
        }

        return view('salary.all-salary',compact('salaryData'));
    }

    public function mySalaryData(Request $request){

        if($request->has('user')){
            $user = $request->user;
        }else{
            $user = Auth::user()->id;
        }


        $valid_sheet = Salary::where('month',$request->month)
            ->where('year',$request->year)
            ->where('user_id',$user)
            ->get();
        if(count($valid_sheet) <= 0){
            return back()->with('msg','No data found!');
        }

        $salaryData = Salary::where('month',$request->month)->where('year', $request->year)
            ->where('user_id',$user)
            ->paginate(20);
        foreach($salaryData as $key => $d){
            $gross = $d->basic + $d->bonus + $d->home_allowance + $d->health_allowance + $d->sales_profit +
                $d->profit_share + $d->lunch + $d->other_earnings + $d->provident_fund + $d->mobile_allowance
                +$d->transportation_allowance;
            $d->gross = $gross;

            $deductions = $d->loan + ($d->provident_fund*2) + $d->other_deductions + $d->leave_taken + $d->late_count;
            $d->deductions = $deductions;
        }

        return view('salary.my-salary-sheet',compact('salaryData'));
    }

    public function dateSelection(){
        $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        return view('salary.salary-date',compact('months'));
    }


    public function makeSalarySheet(Request $request){
       /* /*$allData = Employee::leftjoin('loans','loans.user_id','=','employees.user_id')->where('loans.allowable','=',1)
        ->select('employees.*','loans.loan_payable')->get();*/
        /*$allData = Employee::all();

        $thisDate = Carbon::now();
        
        if($thisDate->month == 1){
            $month = 12;
            $year = $thisDate->year - 1;
        }else{
            $month = $thisDate->month-1;
            $year = $thisDate->year;

        }
        
        
        

        

        foreach($allData as $data){*/

            /*$loanPay = Loan::where('user_id', $data->user_id)->where('allowable',1)->get()->first();
           
            
            $conf = Configuration::where('user_id',$data->user_id)->where('year',$year)->where('month',$month)->get()->first();
           //return $conf;


            $isBonus = Occasion::whereYear('start','=',$year)->whereMonth('start','=',$month)->where('bonus',1)->count();



            $allowed = $conf->leave_allowed;
            $absent = $conf->absent;
            $late_count = $conf->late_count;
            $basic = $data->basic;

            $age = Carbon::parse($data->join_date)->diffInMonths(Carbon::now());

            

            //calculate bonus
            if($age > 6){
                if($isBonus >= 1){
                    $bonus = $basic * 0.5;
                }else{
                    $bonus = 0;
                }
            }else{
                $bonus = 0;
            }



             
            

            //calculate loan
            $loan = $data->loan;
            if(!empty($loanPay)){
                $loan_payable = $loanPay->loan_payable; 
                if(($data->loan - $loanPay->loan_payable)  >= 0){
                    $final_payable_loan = $loanPay->loan_payable;
                    $last_loan = $data->loan - $loanPay->loan_payable;
                    if($last_loan <= 0){
                        $loanPay->allowable = 0;
                        $loanPay->save();
                    }
                    $emp = Employee::where('user_id',$data->user_id)->get()->first();
                    $emp->loan = $last_loan;
                    $emp->save();
                }else{
                    $final_payable_loan = 0;
                    $last_loan = 0;
                    $loan_payable = 0;
                }   
            }else{
                $loan_payable = 0;
                $final_payable_loan = 0;
                $last_loan = 0;
            }
            

            


            //calculate absent
            if($late_count > 2){
                $temp_absent = $absent + ((float)$late_count/(float)3);
            }else{
                $temp_absent = $absent;
            }

            if(($allowed - $temp_absent) < 0){
                $total_absent = ($temp_absent - $allowed);
            }else{
                $total_absent = 0;
            }
            


            $salary_per_day = $basic / 30;

            $adjusted_salary = $basic - ($salary_per_day * $total_absent);
            $final_salary = round($adjusted_salary + $bonus - $final_payable_loan);


            

            Salary::firstOrCreate([
                'user_id' => $data->user_id,
                'year' => $year,
                'month' => $month,
                'basic' => $basic,
                'bonus' => $bonus,
                'prev_loan' => $data->loan,
                'adjust_loan' => $final_payable_loan,
                'last_loan' => $last_loan,
                'leave_allowed' => $allowed,
                'leave_taken' => round($temp_absent),
                'late_count' => $late_count,
                'salary' => $final_salary
                ]);
           


        }
        
        
        return redirect()->back();*/



        $configData = Configuration::where('month',$request->month)->where('year',$request->year)->get();
        if( count($configData) <= 0 ){
            return view('salary.error')->with('message',
                'Before making salary sheet you must have to set late attendance and absence for all employees of this specific month and year')
                ->with('month',$request->month)->with('year',$request->year);
        }



        $employees = Employee::all();

        foreach($employees as $emp){
            $loan = Loan::where('user_id',$emp->user_id)->where('allowable','1')->first();
            $loan_payable = 0;

            if(count($loan) > 0){
                $loan_check = $emp->loan - $loan->loan_payable;

                if($loan_check > 0 ){
                    $loan_payable = $loan->loan_payable;
                    /*$emp->loan = $emp->loan - $loan->loan_payable;
                    $emp->save();*/
                }else if($loan_check == 0){


                    $loan_payable = $loan->loan_payable;
                    $loan->allowable = 0;
                    $loan->save();
                }
                else{
                    $loan_payable = 0;
                    $loan->allowable = 0;
                    $loan->save();

                }
            }

            $late = Configuration::where('month',$request->month)->where('year',$request->year)
                ->where('user_id',$emp->user_id)->pluck('late_count');
            $emp->late = $late;
            $abs = Configuration::where('month',$request->month)->where('year',$request->year)
                ->where('user_id',$emp->user_id)->pluck('absent');
            $emp->absent = $abs;
            $leave_allowed = Configuration::where('month',$request->month)->where('year',$request->year)
                ->where('user_id',$emp->user_id)->pluck('leave_allowed');
            $emp->leave_allowed = $leave_allowed;



            $emp->loan_payable = $loan_payable;
        }


        return view('salary.create-salarysheet',compact('employees'));
    }



    public function saveSalarySheet(Request $request){

        foreach($request->user_id as $key => $emp){
            $salary = new Salary();
            $deduction_a_day = floor((int)$request->basic[$key] / 30);
            $leave_cost = 0;
            $late_cost = 0;

            if(($request->leave_allowed[$key]  - $request->leave_taken[$key]) < 0){
                $leave = ($request->leave_allowed[$key]  - $request->leave_taken[$key]);
                $leave = (-1) * (int)$leave;

                $leave_cost = $leave * $deduction_a_day;



            }

            if($request->late_count[$key] >= 3){
                $late = floor(((int)$request->late_count[$key] / 3));
                $late_cost = $late * $deduction_a_day;



            }

            Salary::updateOrCreate(["user_id" => $emp ,'month' => $request->month, "year"=>$request->year],[
                "user_id" => $emp,
                "month" => $request->month,
                "year" => $request->year,
                "basic" => $request->basic[$key],
                "bonus" => $request->bonus[$key],
                "loan" => $request->loan[$key],
                "home_allowance" => $request->home_allowance[$key],
                "health_allowance" => $request->health_allowance[$key],
                "transportation_allowance" => $request->transportation_allowance[$key],
                "mobile_allowance" => $request->mobile_allowance[$key],
                "sales_profit" => $request->sales_profit[$key],
                "profit_share" => $request->profit_share[$key],
                "lunch" => $request->lunch[$key],
                "other_earnings" => $request->other_earnings[$key],
                "other_deductions" => $request->other_deductions[$key],
                "late_count" => $late_cost,
                "leave_taken" => $leave_cost,
                'oe_text'=> $request->oe_text[$key],
                "od_text" => $request->od_text[$key],
                "provident_fund" => $request->provident_fund[$key],

            ]);

           /* $salary->user_id = $emp;
            $salary->month = $request->month;
            $salary->year = $request->year;
            $salary->basic = $request->basic[$key];
            $salary->bonus = $request->bonus[$key];
            $salary->loan = $request->loan[$key];*/

            $employee = Employee::where('user_id',$emp)->first();
            $employee->loan = $employee->loan - $request->loan[$key];
            $employee->save();

           /* $salary->home_allowance = $request->home_allowance[$key];
            $salary->health_allowance = $request->health_allowance[$key];
            $salary->transportation_allowance = $request->transportation_allowance[$key];
            $salary->mobile_allowance = $request->mobile_allowance[$key];
            $salary->sales_profit = $request->sales_profit[$key];
            $salary->profit_share = $request->profit_share[$key];
            $salary->lunch = $request->lunch[$key];
            $salary->other_earnings = $request->other_earnings[$key];
            $salary->other_deductions = $request->other_deductions[$key];
            $salary->late_count = $late_cost;
            $salary->leave_taken = $leave_cost;
            $salary->save();*/

            $provident = Provident::where('user_id',$emp)->where('flag',1)->first();
            $provident->company = $provident->company + $request->provident_fund[$key];
            $provident->woner = $provident->woner + $request->provident_fund[$key];
            $provident->save();


        }

        return back();

    }

    //end of admin salary panel



    /* Start of user salary panel */



    public function mySalary(){
        /*$salary = Salary::where('user_id',Auth::user()->id)
        ->orderBy('created_at','DESC')->get();
        return view('salary.individual-salary',compact('salary'));*/
        $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        return view('salary.my-salary-date-selection',compact('months'));
    }




    // start of loan section

    public function selectLoanUser(){
        $employees = User::where('role','2')->get();
        $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        return view('salary.select-loan-user',compact('employees','months'));
    }


    public function loanSetting(Request $request){
        $loanData = Employee::where('user_id',$request->user_id)->get()->first();
        
        return view('salary.loan-setting',compact('loanData'));
    }

    public function loan(Request $request,$id){
        $loan = new Loan;
        $loan->date = \Carbon\Carbon::now();
        $loan->user_id = $id;
        $loan->loan_amount = $request->loan_amount;
        $loan->payment_type = $request->ptype;
        $loan->loan_payable = $request->loan_payable;
        $loan->allowable = 1;
        $loan->save();

        $user = Employee::where('user_id',$id)->get()->first();
        $user->loan = $user->loan + $request->loan_amount;
        $user->save();

        return redirect('/');
    }


    public function providentFund(){
        $allowed_list = Employee::where('pf',1)->get();
        $addable_list = Employee::where('pf',0)->get();
        $provident = Provident::where('flag',1)->get();
        $provident->total = 0;
        foreach($provident as $p){
            $p->sub_total = $p->company + $p->woner;
            $provident->first()->total = $provident->first()->total + $p->sub_total;
        }
        return view('Fund.provident-fund',compact('allowed_list','addable_list','provident'));
    }

    public function setProvidentFund(Request $request){

        foreach($request->user_id as $user_id){


            $emp = Employee::where('user_id',$user_id)->first();
            $emp->pf = 1;
            $emp->save();

            Provident::updateOrCreate(["user_id"=>$user_id],[
                'user_id' => $user_id,
                'company' => 0,
                'woner'=> 0,
                'flag' => 1,

            ]);


        }
        return back();
    }

    public function removeFund($id){
        $emp = Employee::where('user_id',$id)->first();
        $emp->pf = 0;
        $emp->save();
        return back();
    }


    public function myProvidentFund(){
        $fund = Provident::where('user_id',Auth::user()->id)->first();
        return view('Fund.my-fund',compact('fund'));

    }

}
