<?php

use Illuminate\Support\Facades\App;

/*get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
        'test-event',
        array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('test');
});*/



    Route::group(['before' => 'force.ssl'], function () {
        Route::get('leave-count','ConfigController@countMonthlyLeave');
        Route::get('config-vacation','ConfigController@hollyDay');
        Route::get('make-salary-sheet','SalaryController@makeSalarySheet');

        Route::group(['middleware'=>'auth'],function(){



            Route::get('change-password','ConfigController@changePassword');
            Route::post('bodlao','ConfigController@bodlao');

            Route::get('/dept-emp','DashboardController@departmentEmployee');

            Route::get('/', 'InitController@setData');



            Route::get('employee-list','EmployeeController@index');


            Route::get('user-profile','EmployeeController@userProfile'); //user can view his profile.
            Route::get('user-profile/{id}','EmployeeController@userProfile'); //admin can view user profile.
            Route::get('add-user-data',function(){ //user can provide his information if no data
                //found.
                return view('employee.add-user-data');
            });


            /*starts user routes*/




            Route::post('add-details/','EmployeeController@addDetails');
            Route::get('user-edit/','EmployeeController@userEdit'); // user can bring this of edit
            Route::post('update-edited-data','EmployeeController@updateEditedData');
            Route::post('add-academic-data','EmployeeController@addAcademicData');
            Route::post('edit-academic-data','EmployeeController@editAcademicData');

            //add skills
            Route::post('add-skills','EmployeeController@addSkills');
            Route::post('edit-skills','EmployeeController@editSkills');
            Route::get('delete-skill/{id}','EmployeeController@deleteSkill');
            Route::get('delete-academic-qualification/{id}','EmployeeController@deleteAcademicQualification');


            //add training

            Route::post('add-training','EmployeeController@addTraining');
            Route::post('edit-training','EmployeeController@editTraining');
            Route::get('delete-training/{id}','EmployeeController@deleteTraining');


            //add experience

            Route::post('add-experience','EmployeeController@addExperience');
            Route::post('edit-experience','EmployeeController@editExperience');

            //add reference
            Route::post('edit-reference','EmployeeController@editReference');



            //send application

            Route::get('compose-application','ApplicationController@composeApplication');
            Route::post('send-application','ApplicationController@sendApplication');
            Route::get('sent-applications','ApplicationController@sentApplications');


            //salary portion
            Route::get('my-salary','SalaryController@mySalary');
            Route::get('my-salary-data','SalaryController@mySalaryData');


            Route::get('my-provident-fund','SalaryController@myProvidentFund');


            //employee report
            Route::get('select-date','ReportController@selectDate');
            Route::get('create-report','ReportController@createReport');
            Route::post('create-this','ReportController@createThis');


            /*ends user routes*/


            /*starts admin routes*/
            Route::group(['middleware' => 'admin'],function(){

                //add employee
                Route::get('/add-employee','EmployeeController@create');
                Route::post('/create-employee','EmployeeController@createEmployee'); //admin create a user
                Route::get('/check-user/{id}','EmployeeController@checkUser');

                //Delete employee
                Route::get('user-delete/{id}','EmployeeController@userDelete');

                Route::post('add-details/{id}','EmployeeController@addDetails');
                Route::get('user-edit/{id}','EmployeeController@userEdit'); // user can bring this of edit
                Route::post('update-edited-data/{id}','EmployeeController@updateEditedData');
                Route::post('add-academic-data/{id}','EmployeeController@addAcademicData');
                Route::post('edit-academic-data/{id}','EmployeeController@editAcademicData');

                //add skills
                Route::post('add-skills/{id}','EmployeeController@addSkills');
                Route::post('edit-skills/{id}','EmployeeController@editSkills');
                Route::get('delete-skill/{id}{id1}','EmployeeController@deleteSkill');
                Route::get('delete-academic-qualification/{id}{id1}','EmployeeController@deleteAcademicQualification');


                //add training

                Route::post('add-training/{id}','EmployeeController@addTraining');
                Route::post('edit-training/{id}','EmployeeController@editTraining');
                Route::get('delete-training/{id}{id1}','EmployeeController@deleteTraining');



                //add experience
                Route::post('add-experience/{id}','EmployeeController@addExperience');
                Route::post('edit-experience/{id}','EmployeeController@editExperience');

                //add reference
                Route::post('edit-reference/{id}','EmployeeController@editReference');


                //application portion
                Route::get('application-inbox','ApplicationController@applicationInbox');
                Route::get('/set-accepted/{id}','ApplicationController@setAccepted');
                Route::get('/set-rejected/{id}','ApplicationController@setRejected');

                Route::get('read-app/{id}','ApplicationController@readApp');



                //Reports

                Route::get('select-report-month','ReportController@selectReportMonth');
                Route::get('reports','ReportController@reports');










                //Notice portion

                Route::get('/compose-notice',function(){
                    return view('notices.compose');
                });

                Route::post('/add-notice','NoticeController@addNotice');


                //salary portion

                Route::get('add-salary','SalaryController@addSalary');
                //Route::get('select-date','SalaryController@selectDate');
                //Route::get('make-salary-sheet','SalaryController@makeSalarySheet');

                Route::get('salary-data','SalaryController@salaryData');

                Route::post('salary/{id}','SalaryController@salary');
                Route::get('sheet-selection','SalaryController@sheetSelection');
                Route::get('all-salary','SalaryController@allSalary');
                Route::get('individual-salary/{id}','SalaryController@individualSalary');
                Route::post('get-employee','SalaryController@getEmployee');
                Route::get('go-salary/{id}','SalaryController@goSalary');


                Route::get('date-selection','SalaryController@dateSelection');

                Route::post('save-salary-sheet','SalaryController@saveSalarySheet');



                //loan portion

                Route::get('select-loan-user','SalaryController@selectLoanUser');
                Route::post('loan-setting','SalaryController@loanSetting');

                Route::post('loan/{id}','SalaryController@loan');


                //Provident fund
                Route::get('provident-fund','SalaryController@providentFund');
                Route::post('set-provident-fund','SalaryController@setProvidentFund');
                Route::get('remove-fund/{id}','SalaryController@removeFund');



                //configuration
//			Route::get('config-vacation','ConfigController@hollyDay');
                //This should be configure at the first day of any year

                Route::get('date-config','ConfigController@dateConfig');

                Route::post('save-date','ConfigController@saveDate');

                Route::get('upload-pos',function(){
                    return view('configuration.pos');
                });
                //Route::get('late-and-leave','TrackController@countLateAndLeave');
                Route::post('dat-data','TrackController@datData');

                //This should be done monthly
                //Route::get('leave-count','ConfigController@countMonthlyLeave');

                Route::get('get-entry-time','ConfigController@getEntryTime');

                Route::post('set-entry-time','ConfigController@setEntryTime');


                //resources
                Route::get('up-resource',function(){
                    return view('hrmresources.upload');
                });
                Route::post('up-res','ResourceController@upRes');
                Route::get('delete/{id}','ResourceController@deleteResource');



                //Add performance
                Route::get('/performance','PerformanceController@create');
                Route::post('/performance','PerformanceController@store');

                Route::get('/get-performance/{id1}/{id2}/{id3}','PerformanceController@getPerformance');

                //set absence and late count
                Route::get('/get-late-absence','ConfigController@getLateAbsence');
                Route::post('/set-late-absence','ConfigController@setLateAbsence');

                //end of internal admin middleware
            });



            /*ends admin routes*/


            //ODBC

            //resources
            Route::get('resource-list','ResourceController@getResources');
            Route::get('/download/{id}','ResourceController@downloadResource');

            /*send mail*/

            Route::get('test-mail','InitController@testMail');



            /*combile section*/

            Route::get('notice-board','NoticeController@index');
            Route::get('compose-mail','MailController@create');

            //mail
            Route::get('mail-sent','MailController@sent');
            Route::post('send-mail','MailController@sendMail');
            Route::get('mail-inbox','MailController@inbox');
            Route::get('read/{id}','MailController@read');



            //show my performance
            Route::get('my-performance','PerformanceController@myPerformance');

        });

        // Authentication routes...
        Route::get('auth/login', 'Auth\AuthController@getLogin');
        Route::post('auth/login', 'Auth\AuthController@postLogin');

        Route::get('auth/logout', 'Auth\AuthController@getLogout');

        // Registration routes...
        Route::get('very-secure-admin-creation-sisy4lana', 'Auth\AuthController@getRegister');
        Route::post('auth/register', 'Auth\AuthController@postRegister');


    });


