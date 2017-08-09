<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDO;
use App\Tracker;
use App\User;
use App\Configuration;
use \Carbon\Carbon;
use File;

use PHPExcel_IOFactory;

class TrackController extends Controller
{
    
  /* public function makeData(){
        $dbName = "RAS.mdb";
        //check file exist before we proceed
        if (!file_exists($dbName)) {
            die("Access database file not found !");
        }else{
             $db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$dbName; Uid=; Pwd=ras258;");
             $sql  = "SELECT * from ras_AttRecord order by ras_AttRecord.ID ASC";
             $result = $db->query($sql);
             foreach($result as $data){
                $track = new Tracker;
                $track->user_id = $data['DIN'];
                $datetime = Carbon::parse($data['Clock']);
                $date = $datetime->year.'-'.$datetime->month.'-'.$datetime->day;
                $track->entry_date = $date;
                $time = $datetime->hour.":".$datetime->minute.":".$datetime->second;
                $track->entry_time = ($datetime->hour * 60 ) + $datetime->minute;
                $track->save();

             }
        }
   }*/

   public function datData(Request $request){

        set_time_limit(600);

        //First upload the file into public folder

        


          //$DayOfMonth = [31,$start->isLeapYear() ? 29:28,31,30,31,30,31,31,30,31,30,31];
          $month = Carbon::now()->month;
          $year =  Carbon::now()->year;
          $day = Carbon::now()->day;

          $checkUpdate = Configuration::whereYear('updated_at','=',$year)
          ->whereMonth('updated_at','=',$month)
          ->whereDay('updated_at','=',$day)
          ->get()->first();


        
          //if(sizeof($checkUpdate) <=0 ){
          //if(1==1){
            $destination = "Attendance";
            if($request->hasFile('attendance')){
                $attendanceFile = $request->file('attendance');
                $fileName = $attendanceFile->getClientOriginalName();
               
                if($attendanceFile->move($destination,'db.dat')){
                  
                }else{
                  echo  "Cannot move";
                  return redirect('upload-pos');
                }

            }else{
              echo  "No file selected!";
              return redirect('upload-pos');
            }
            if(File::exists('Attendance/db.dat')){
                $db = file('Attendance/db.dat');
                 $data = [];
                 foreach($db as $key => $d){
                      $data[$key] = preg_split("/\s+/",$d);
                 }

                  foreach($data as $d){
                      
                      $datetime = Carbon::parse($d[2]);
                      $pureTime = Carbon::parse($d[3]);
                      
                      $date = $datetime->year.'-'.$datetime->month.'-'.$datetime->day;
                      $time = (($pureTime->hour * 60 )+ $pureTime->minute);
                      //return $pureTime."->".$time;
                      //$separation = explode(":", $pureTime);
                     
                     if($d[4] == 1){
                          Tracker::firstOrCreate([
                              'user_id' => $d[1],
                              'entry_date' => $date,
                              'entry_time' => $time
                          ]);
                     }

                      
                  }
                  $this->countLateAndLeave();
                  return redirect('/');
            }else{
              $errorMSG ="Please upload the .dat file";
              return view('errors.access-denies',compact('errorMSG'));
            }
      /* }else{
        
        $errorMSG = "You cannot upload this file anymore today!";
        return view('errors.access-denies',compact('errorMSG') );
       }*/
        
       return redirect()->back();

   }

   //this function will be operating everyday
    private function countLateAndLeave(){
        
        $today = Carbon::now();

        $DayOfMonth = [31,$today->isLeapYear() ? 29:28,31,30,31,30,31,31,30,31,30,31];
        $users = User::all();
        
        $month = Carbon::now()->month;
        $year =  Carbon::now()->year;
        $day = Carbon::now()->day;

        /*$checkUpdate = Configuration::whereYear('updated_at','=',$year)
        ->whereMonth('updated_at','=',$month)
        ->whereDay('updated_at','=',$day)
        ->get()->first();*/
        $users =  User::where('role','2')->get();

        
            foreach($users as $key => $user){
              
              $time = Carbon::parse($user->entry_time);
              $entry_time = ($time->hour * 60 + $time->minute + 5);

              $absent = 0;
              $late = 0;
              for($i = 1; $i <= $DayOfMonth[$month-1]; $i++){
                   $posData = Tracker::orderBy('entry_date','ASC')
                       ->whereMonth('entry_date','=',$month)
                       ->whereDay('entry_date','=',$i)
                       ->where('user_id',$user->id)
                       ->orderBy('entry_time','ASC')
                       ->get()->first();

                   
                    
                    if(sizeof($posData) <= 0){
                        $absent++;
                    }else{
                      if($posData->entry_time > $entry_time ){
                        $late++;
                      }
                    }
              }

              $conf = Configuration::where('user_id',$user->id)
                  ->where('year',$year)->where('month',$month)->get()->first();
              
              $conf->late_count = $conf->late_count + $late;
              $conf->absent = $conf->absent + $absent;
              $conf->save();

             
             
              
          }
       

        
        
    }
}
