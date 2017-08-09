<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;

use Input;

use App\User;
use App\Employee;
use App\Academic;
use App\Skill;
use App\Training;
use App\Experience;
use App\Configuration;
use App\Occasion;
use App\Reference;

use Auth;
use Mail;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checkUser($id){
        //$user = Employee::where('user_id',$id)->get()->first();
        $user = User::where('id',$id)->get()->first();
        return \Response::json($user);
    }

    public function index()
    {
        /*$employees = Employee::where('user_id','>','0')
            ->where('enable',1)
            ->orderBy('user_id','ASC')
            ->get();
        return view('employee.employee',compact('employees'));*/
        $employees = Employee::where('user_id','>','0')->orderBy('user_id','ASC')->paginate(10);
        return view('employee.employee',compact('employees'));
    }

    public function userDelete($id){
        $emp = Employee::where('user_id',$id)->get()->first();
        $emp->enable = 0;
        $emp->save();

        $usr = User::where('id',$id)->get()->first();
        $usr->delete();
        return \Response::json("Successfully Deleted");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add-employee');
    }

    public function createEmployee(Request $request){
        //if($request->password === $request->password_confirmation){
        $user = new User;
        $employee = new Employee;

        $user->id = $request->id;
        $user->email = $request->email;
        $user->name = $request->name;

        $password = "etluserpassword";
        $user->password = bcrypt($password);
        $user->role = '2';
        $user->entry_time = Carbon::parse($request->entry_time)->toTimeString();
        $user->save();


        $getUser = User::where('email',$request->email)->get()->first();
        $employee->user_id = $getUser->id;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->basic = $request->basic;
        $employee->loan = 0;
        $employee->job_title = $request->job_title;
        $employee->department = $request->department;
        $employee->job_type = $request->job_type;
        $employee->join_date = $request->join_date;
        $employee->enable = 1;



        $month = Carbon::now()->month;
        $year  = Carbon::now()->year;
        $leaves = Occasion::whereYear('start','=',$year)
            ->whereMonth('start','=',$month)->get()->sum('days');

        $config = new Configuration;
        $config->user_id = $request->id;
        $config->year = Carbon::now()->year;
        $config->month = Carbon::now()->month;
        $config->leave_allowed = $leaves;

        $config->save();



        $employee->save();

        /*Sending message to every employee*/

        $to = $request->email;
        $subject = "Welcome to Ezzetechnology";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message = "Dear ". $request->name. ",<br>Your account has been created at HRM Ezzetech ltd. Your email and password are : <br>Email : ".$request->email. "<br>Password : ".$password ."(We recommend you to change this password by going change password page)". "<br>Please go to  <a href='https://hrm.etl.com.bd/'>https://hrm.etl.com.bd</a> and login using your email and password. <br>After that we are encouraging you to update your profile by going to profile page.<br>Thank you.<br>HR<br>Ezzetechnology ltd";

        $m = mail($to,$subject,$message,$headers);


        // }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //display user profile section

    public function userProfile($id=""){

        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

        $employees = Employee::where('user_id',$user_id)->get()->first();
        $supervisor = Employee::where('user_id',$employees->supervisor_id)->get()->first();
        // return $supervisor;
        $academics = Academic::where('user_id',$user_id)->orderBy('degree','DESC')->get();
        $skills    = Skill::where('user_id',$user_id)->get();
        $trainings    = Training::where('user_id',$user_id)->get();
        $exps = Experience::where('user_id',$user_id)->get();


        $references = Reference::where('user_id',$user_id)->get();

        return view('employee.user-profile',compact('employees','academics','skills','trainings','exps','supervisor','references'));



    }

    public function userEdit($id=""){

        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

        $userData = Employee::where('user_id',$user_id)->get()->first();
        $academicData = Academic::where('user_id',$user_id)->get();
        $skillData = Skill::where('user_id',$user_id)->get();
        $trainingData = Training::where('user_id',$user_id)->get();
        $expData = Experience::where('user_id',$user_id)->get();
        $refData = Reference::where('user_id',$user_id)->get();
        return view('employee.user-edit',compact('userData','academicData','skillData','trainingData','expData','refData'));
    }


    //add employee details
    public function addDetails(Request $request,$id=""){
        //add details to the employee table

        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

        $employee = new Employee;

        $info  = $request->all();

        $destinationPath = "EmployeeImages";
        if($request->hasFile('avater')){
            $avaterFile = $request->file('avater');
            $avaterFileName = $avaterFile->getClientOriginalName();
            $avaterFile->move($destinationPath,$avaterFileName);
            $avaterFileLink = $destinationPath.'/'.$avaterFileName;
        }else{
            $avaterFileLink = "";
        }



        $destinationPathNID = "EmployeeImages/NID";
        if($request->hasFile('nid_image')){
            $NIDFile = $request->file('nid_image');
            $NIDFileName = $NIDFile->getClientOriginalName();
            $NIDFile->move($destinationPathNID,$NIDFileName);
            $NIDFileLink = $destinationPathNID.'/'.$NIDFileName;
        }else{
            $NIDFileLink = "";
        }




        //save data to database
        //personal data
        $employee->user_id = $user_id;
        $employee->name = $request->name;

        $employee->father_name = $request->father_name;
        $employee->mother_name = $request->mother_name;
        $employee->spouse_name = $request->spouse_name;
        $employee->blood_group = $request->blood_group;
        $employee->nationality = $request->nationality;
        $employee->religion = $request->religion;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->image_url = $avaterFileLink;
        $employee->nid_no = $request->nid_no;
        $employee->nid_url = $NIDFileLink;

        //contact data
        $employee->mobile = $request->mobile;
        $employee->alt_mobile = $request->alt_mobile;
        $employee->guardian_mobile = $request->guardian_mobile;
        $employee->email = Auth::user()->email;
        $employee->skype = $request->skype;
        $employee->linkedin = $request->linkedin;

        //job description
        $employee->job_title = $request->job_title;
        $employee->job_type = $request->job_type;
        $employee->supervisor_id = $request->supervisor_id;
        $employee->account_no = $request->account_no;
        $employee->join_date = $request->join_date;
        $employee->department = $request->department;
        $employee->equipments = $request->equipments;


        $employee->save();



        if($id == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id);
        }


        // return $request->all();


    }




    public function updateEditedData(Request $request, $id=""){

        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

        $employee = Employee::where('user_id',$user_id)->get()->first();
        $user = User::where('id',$user_id)->get()->first();



        if($request->hasFile('avater')){
            $destinationPath = "EmployeeImages";
            $avaterFile = $request->file('avater');
            $avaterFileName = $avaterFile->getClientOriginalName();
            $avaterFile->move($destinationPath,$avaterFileName);
            $avaterFileLink = $destinationPath.'/'.$avaterFileName;
        }else{
            $avaterFileLink = $employee->image_url;
        }


        if($request->hasFile('nid_image')){

            $destinationPathNID = "EmployeeImages/NID";
            $NIDFile = $request->file('nid_image');
            $NIDFileName = $NIDFile->getClientOriginalName();
            $NIDFile->move($destinationPathNID,$NIDFileName);
            $NIDFileLink = $destinationPathNID.'/'.$NIDFileName;


        }else{
            $NIDFileLink = $employee->nid_url;
        }


        //save data to database


        $employee->name = $request->name;
        $user->name  = $request->name;
        $user->save();

        $employee->father_name = $request->father_name;
        $employee->mother_name = $request->mother_name;
        $employee->spouse_name = $request->spouse_name;
        $employee->blood_group = $request->blood_group;
        $employee->nationality = $request->nationality;
        $employee->religion = $request->religion;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->image_url = $avaterFileLink;
        $employee->nid_no = $request->nid_no;
        $employee->nid_url = $NIDFileLink;

        //contact data
        $employee->mobile = $request->mobile;
        $employee->alt_mobile = $request->alt_mobile;
        $employee->guardian_mobile = $request->guardian_mobile;

        $employee->skype = $request->skype;
        $employee->linkedin = $request->linkedin;

        //job description

        $employee->supervisor_id = $request->supervisor_id;
        $employee->account_no = $request->account_no;

        if($id == ""){

        }else{
            $employee->department = $request->department;
            $employee->job_title = $request->job_title;
            $employee->job_type = $request->job_type;
	    $employee->join_date = $request->join_date;
        }


        $employee->equipments = $request->equipments;

        $employee->save();



        if($id == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id);
        }
    }


    public function addAcademicData(Request $request, $id = ""){

        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

        foreach($request->degree as $key => $info){
            $academy = new Academic;
            $academy->user_id = $user_id;
            $academy->degree = $request->degree[$key];
            $academy->institute = $request->institute_name[$key];
            $academy->subject = $request->subject[$key];
            $academy->session = $request->session[$key];
            $academy->CGPA = $request->cgpa[$key];
            $academy->board = $request->board[$key];
            $academy->save();
        }

        return redirect('/user-edit');


    }

    public function editAcademicData(Request $request, $id = ""){

        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

        $academy = Academic::where('user_id',$user_id)->get();
        //return sizeof($academy);

        foreach($request->degree as $key => $info){


            if($key <= sizeof($academy)-1 ){
                $academy[$key]->user_id = $user_id;
                $academy[$key]->degree = $request->degree[$key];
                $academy[$key]->institute = $request->institute_name[$key];
                $academy[$key]->subject = $request->subject[$key];
                $academy[$key]->session = $request->session[$key];
                $academy[$key]->CGPA = $request->cgpa[$key];
                $academy[$key]->board = $request->board[$key];
                $academy[$key]->save();
            }else{

                $justInsert = new Academic;
                $justInsert->user_id = $user_id;
                $justInsert->degree = $request->degree[$key];
                $justInsert->institute = $request->institute_name[$key];
                $justInsert->subject = $request->subject[$key];
                $justInsert->session = $request->session[$key];
                $justInsert->CGPA = $request->cgpa[$key];
                $justInsert->board = $request->board[$key];
                $justInsert->save();


            }






        }

        if($id == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id);
        }

    }



    public function deleteAcademicQualification($id1, $id2 = ""){
        $id2 == "" ? $user_id = Auth::user()->id : $user_id = $id2;

        $academicInfo = Academic::where('user_id',$user_id)
            ->where('id',$id1)->get()->first();
        $academicInfo->delete();
        if($id2 == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id2);
        }
    }


    //add skills information
    public function addSkills(Request $request,$id=""){

        if($id == ""){
            $user_id = Auth::user()->id;
        }else{
            $user_id = $id;
        }


        foreach($request->skills as $skill){
            $skillObject = new Skill;
            $skillObject->user_id = $user_id;
            $skillObject->skills = $skill;
            $skillObject->proficiency = $request->proficiency;
            $skillObject->save();
        }
        return redirect('/user-edit');
    }


    public function editSkills(Request $request, $id = ""){

        //return $request->all();

        if($id == ""){
            $user_id = Auth::user()->id;
        }else{
            $user_id = $id;
        }



        $userSkills = Skill::where('user_id',$user_id)->get();
        //return sizeof($skills);

        foreach($request->skills as $key => $sk){
            if($key <= sizeof($userSkills)-1){

                $userSkills[$key]->skills = $sk;
                $userSkills[$key]->proficiency = $request->proficiency[$key];
                $userSkills[$key]->save();

            }else{
                $skill = new Skill;
                $skill->user_id = $user_id;
                $skill->skills = $sk;
                $skill->proficiency = $request->proficiency[$key];
                $skill->save();
            }
        }
        if($id == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id);
        }
    }

    public function deleteSkill($id1){


        $skill = Skill::where('id',$id1)->get()->first();
        //return $skill;
        $skill->delete();
       return redirect()->back();

    }


    //Training section

    public function addTraining(Request $request,$id = ""){
        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;


        foreach($request->title as $key => $title){

            $training = new Training;

            $training->user_id = $user_id;
            $training->title = $request->title[$key];
            $training->description = $request->description[$key];
            $training->institute = $request->institute[$key];
            $training->type = $request->type[$key];
            $training->year = $request->year[$key];
            $training->duration = $request->duration[$key];
            $training->save();
        }

        if($id == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id);
        }

    }

    public function editTraining(Request $request, $id = ""){
        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

        $training = Training::where('user_id',$user_id)->get();
        foreach($request->title as $key => $title){
            if($key <= sizeof($training)-1 ){
                $training[$key]->title = $request->title[$key];
                $training[$key]->description = $request->description[$key];
                $training[$key]->institute = $request->institute[$key];
                $training[$key]->type = $request->type[$key];
                $training[$key]->year = $request->year[$key];
                $training[$key]->duration = $request->duration[$key];
                $training[$key]->save();
            }else{
                $training = new Training;

                $training->user_id = $user_id;
                $training->title = $request->title[$key];
                $training->description = $request->description[$key];
                $training->institute = $request->institute[$key];
                $training->type = $request->type[$key];
                $training->year = $request->year[$key];
                $training->duration = $request->duration[$key];
                $training->save();

            }
        }
        if($id == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id);
        }
    }

    public function deleteTraining($id1, $id2 = ""){

        $id2 == "" ? $user_id = Auth::user()->id : $user_id = $id2;

        $training = Training::where('user_id',$user_id)
            ->where('id',$id1)->get()->first();
        $training->delete();


        if($id2 == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id2);
        }
    }

    public function editReference(Request $request, $id = ""){
        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;
        $reference = Reference::where('user_id',$user_id)->get();
        foreach($request->name as $key => $name){
            if($key <= sizeof($reference) - 1){
                $reference[$key]->name = $request->name[$key];
                $reference[$key]->designation = $request->designation[$key];
                $reference[$key]->mobile = $request->mobile[$key];
                $reference[$key]->email = $request->email[$key];
                $reference[$key]->description = $request->description[$key];
                $reference[$key]->relation = $request->relation[$key];
                $reference[$key]->save();
            }else{
                $ref = new Reference;
                $ref->user_id = $user_id;
                $ref->name = $request->name[$key];
                $ref->designation = $request->designation[$key];
                $ref->mobile = $request->mobile[$key];
                $ref->email = $request->email[$key];
                $ref->description = $request->description[$key];
                $ref->relation = $request->relation[$key];
                $ref->save();
            }
        }
        if($id == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id);
        }
    }


    public function sendMail(){
        $data = [];
        Mail::send('welcome',$data,function($message){
            $message->from('sajeeb07ahamed@gmail.com','Laravel');
            $message->to('sajeeb07ahamed@gmail.com');

        });
    }


    // add experiences
    public function addExperience(Request $request, $id=""){
        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;

        foreach($request->worksplace as $key => $w){
            $exp = new Experience;
            $exp->user_id = $user_id;
            $exp->address = $request->address[$key];
            $exp->worksplace = $request->worksplace[$key];
            $exp->designation = $request->designation[$key];
            $exp->duration = $request->duration[$key];
            $exp->description = $request->description[$key];

            $exp->save();

            if($id == ""){
                return redirect('user-edit');
            }else{
                return redirect('user-edit/'.$id);
            }

        }

    }


    public function editExperience(Request $request, $id=""){
        $id == "" ? $user_id = Auth::user()->id : $user_id = $id;
        $exp = Experience::where('user_id',$user_id)->get();

        foreach($request->worksplace as $key => $w){
            if($key <= sizeof($exp)-1){

                $exp[$key]->address = $request->address[$key];
                $exp[$key]->worksplace = $request->worksplace[$key];
                $exp[$key]->designation = $request->designation[$key];
                $exp[$key]->duration = $request->duration[$key];
                $exp[$key]->description = $request->description[$key];

                $exp[$key]->save();
            }else{
                $experience = new Experience;
                $experience->user_id = $user_id;
                $experience->address = $request->address[$key];
                $experience->worksplace = $request->worksplace[$key];
                $experience->designation = $request->designation[$key];
                $experience->duration = $request->duration[$key];
                $experience->description = $request->description[$key];

                $experience->save();

            }

        }


        if($id == ""){
            return redirect('user-edit');
        }else{
            return redirect('user-edit/'.$id);
        }
    }


}
