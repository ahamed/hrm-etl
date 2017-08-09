<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Notice;
use App\User;
use OneSignal;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('created_at','DESC')->get();

        return view('notices.notice-board',compact('notices'));
    }


    public function addNotice(Request $request){
        $notice = new Notice;
        $notice->topic = $request->topic;
        $notice->content = $request->contant;
        $notice->save();
        OneSignal::sendNotificationToAll("A notice has added at the notice board. Please see this.", $url = 'https://hrm.etl.com.bd/notice-board', $data = null);

        return redirect('/notice-board');
    }



    
}
