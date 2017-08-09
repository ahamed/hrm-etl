<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use App\Application;
use Auth;
use Session;

use App\Configuration;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function composeApplication(){

        $tos = User::where('role',1)->get();
        return view('applications.compose',compact('tos'));
    }

    public function sendApplication(Request $request){

        $application = new Application;

        $application->sender_id = Auth::user()->id;
        $application->receiver_id = $request->receiver_id;
        //$application->subject = $request->subject;
        $application->type = $request->subject;
        $application->content = $request->app_content;
        $application->status = "pending";
        if($request->subject == "Leave in advance"){
            $application->days = $request->addays;
        }else if($request->subject == "Leave of absence"){
            $application->days = $request->abdays;
        }


        $application->save();
        return redirect('/');



    }

    public function readApp($id){
        $app = Application::where('id',$id)->get()->first();
        $app->status = "viewed";
        $app->save();
        return redirect('application-inbox');
    }

    public function sentApplications(Request $request){


        $applications = Application::where('sender_id',Auth::user()->id)
            ->orderBy('created_at','DESC')
            ->get();
        $senders = Application::join('users','users.id','=','applications.sender_id')->get();
        $receivers = Application::join('users','users.id','=','applications.receiver_id')->get();
        //$applications = Application::where('sender_id',Auth::user()->id)->get();
        return view('applications.sent-applications',compact('applications','senders','receivers'));

    }



    public function applicationInbox(){
        $applications = Application::where('receiver_id',Auth::user()->id)
            ->orderBy('created_at','DESC')
            ->get();
        $senders = Application::join('users','users.id','=','applications.sender_id')->get();
        $receivers = Application::join('users','users.id','=','applications.receiver_id')->get();
        return view('applications.received-applications',compact('applications','senders','receivers'));
    }



    public function setAccepted($id){
        $app = Application::where('id',$id)->get()->first();
        $app->status = "accepted";
        $app->save();
        $this->setSessionData();
        if($app->type == "Late attendance"){
            $conf = Configuration::where('user_id',$app->sender_id)->get()->first();
            $conf->late_count = $conf->late_count - 1;
            $conf->save();
        }else{
            $conf = Configuration::where('user_id',$app->sender_id)->get()->first();
            $conf->leave_allowed = $conf->leave_allowed + $app->days;
            $conf->save();
        }

        return redirect('application-inbox');
    }
    public function setRejected($id){
        $app = Application::where('id',$id)->get()->first();
        $app->status = "rejected";
        $app->save();
        $this->setSessionData();
        return redirect('application-inbox');
    }


    private function setSessionData(){
        $adminCount = Application::where('receiver_id',Auth::user()->id)->where('status','pending')->get()->count();
        $userCount = Application::where('sender_id',Auth::user()->id)->where('status','pending')->get()->count();
        Session::put('user_sentbox_count',$userCount);
        Session::put('admin_inbox_count',$adminCount);
    }
}
