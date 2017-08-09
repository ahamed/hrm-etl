<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Auth;
use Session;

use App\Email;
use App\User;
use OneSignal;
class MailController extends Controller
{
    
    public function index()
    {
        
    }


    public function create(){
        $tos = User::all();
        return view('mail.compose',compact('tos'));
    }

    public function sendMail(Request $request){
        $mail = new Email;
        $mail->sender_id = Auth::user()->id;
        $mail->receiver_id = $request->receiver_id;
        $mail->subject = $request->subject;
        $mail->content = $request->content;
        $mail->save();
        $this->setSessionData();
        $parameters['filters'] = [
            [
                'field' => 'tag',
                'key'=> 'user_id',
                'relation' => '=',
                'value' => $request->receiver_id
            ]
        ];
        $parameters['contents'] = [
            "en" => 'You have found a mail. Check it at mail box'
        ];
        $parameters['url'] = 'https://hrm.etl.com.bd/mail-inbox';
        OneSignal::sendNotificationCustom($parameters);
        return redirect('/mail-sent');
    }

    public function sent(){
        $mails = Email::where('sender_id',Auth::user()->id)->get();
        $senders = Email::join('users','users.id','=','emails.sender_id')->get();
        $receivers = Email::join('users','users.id','=','emails.receiver_id')->get();
        return view('mail.sent',compact('mails','senders','receivers'));
    }
    public function inbox(){
        $mails = Email::where('receiver_id',Auth::user()->id)->get();
        $senders = Email::join('users','users.id','=','emails.sender_id')->get();
        $receivers = Email::join('users','users.id','=','emails.receiver_id')->get();
        return view('mail.inbox',compact('mails','senders','receivers'));
    }

    public function read($id){
        $mail = Email::where('receiver_id',Auth::user()->id)->where('id',$id)->get()->first();
        if($mail->status == 0){
            $mail->status = '1';
        }
        $mail->save();
        $this->setSessionData();
        return redirect('/mail-inbox');
    }
    
    private function setSessionData(){
        $inbox = Email::where('receiver_id',Auth::user()->id)
        ->where('status','0')
        ->get()->count();
        Session::put('inbox',$inbox);
   }
}
