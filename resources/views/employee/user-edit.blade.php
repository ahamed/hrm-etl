@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')
<link rel="stylesheet" href="{{URL::asset('css/form-elements.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/style1.css')}}">
<style>
    input{
        height:50px;
    }

    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        white-space:pre-line;
        position:relative;
        top:-7px;

    }
    ::-moz-placeholder { /* Firefox 19+ */
        white-space:pre-line;
        position:relative;
        top:-7px;
    }
    :-ms-input-placeholder { /* IE 10+ */
        white-space:pre-line;
        position:relative;
        top:-7px;
    }
    :-moz-placeholder { /* Firefox 18- */
        white-space:pre-line;
        position:relative;
        top:-7px;
    }
</style>
@endsection


@section('content')

    <div class="col-md-12">
        
        	<!-- Top content -->
        <div class="top-content">
            <div class="container">
                @include('layouts.employee-menu')
                
                
                <div class="row" id="pibody">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="{{Request::segment(2) == null ? url('update-edited-data') : url('update-edited-data/'.Request::segment(2)) }}" method="post" class="f1" enctype="multipart/form-data">
							{{csrf_field()}}
                    		<h3>Employee Details</h3>
                    		<p>Add your details to store your information</p>
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			</div>
                    			<div class="f1-step active">
                    				<div class="f1-step-icon"><i class="fa fa-address-card"></i></div>
                    				<p>Job details</p>
                    			</div>
                    			<div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-info-circle"></i></div>
                    				<p>Personal data</p>
                    			</div>
                    		    <div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-mobile-phone"></i></div>
                    				<p>Contacts</p>
                    			</div>
                    		</div>
                    		
                    		<fieldset>
                    		    <h4>Tell us about your current job information</h4>
                    			<div class="form-group">
                    			    <label class="" for="f1-first-name">Join Date</label>
                                    <input type="date" name="join_date" placeholder="Join date" class="f1-first-name form-control" id="f1-first-name" value="{{$userData->join_date}}" {{Auth::user()->role == 2 ? 'disabled' : ''  }}>
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-last-name">Job Title</label>
                                    <input type="text" name="job_title" placeholder="Job Title" class="f1-last-name form-control" id="f1-last-name" value="{{$userData->job_title}}" {{Auth::user()->role == 2 ? 'disabled' : ''  }}>
                                </div>
                                
                                <div class="form-group">
                                    <label class="" for="f1-about-yourself">Job Type</label>

                                    <select name="job_type" id="" class="form-control" {{Auth::user()->role == 2 ? 'disabled' : ''  }}>
                                    	<option value="">Select job type</option>
                                    	<option value="Full Time" {{$userData->job_type == 'Full Time' ? 'selected' : ''}}>Full Time</option>
                                    	<option value="Part Time" {{$userData->job_type == 'Part Time' ? 'selected' : ''}}>Part Time</option>
                                    	<option value="Innovation Team" {{$userData->job_type == 'Innovation Team' ? 'selected' : ''}}>Innovation Team</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-last-name">Department</label>
                                    

                                    <select name="department" id="" class="form-control" {{Auth::user()->role == 2 ? 'disabled' : ''  }}>

                                        <option value="">Select a department</option>
                                        <option value="Development" {{$userData->department=='Development' ? 'selected' : ''}}>Development</option>
                                        <option value="HR" {{$userData->department=='HR' ? 'selected' : ''}}>HR</option>
                                        <option value="Sales and Operation" {{$userData->department=='Sales and Operation' ? 'selected' : ''}}>Sales and Operation</option>
                                        <option value="Marketing and Promotion" {{$userData->department=='Marketing and Promotion' ? 'selected' : ''}}>Marketing and Promotion</option>
                                        <option value="Design and Creativity" {{$userData->department=='Design and Creativity' ? 'selected' : ''}}>Design and Creativity</option>
                                        <option value="Business Development" {{$userData->department=='Business Development' ? 'selected' : ''}}>Business Development</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-last-name">Account no</label>
                                    <input type="text" name="account_no" placeholder="Accouont no." class="f1-last-name form-control" id="f1-last-name" value="{{$userData->account_no}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-last-name">Supervisor</label>
                                    <input type="text" name="supervisor_id" placeholder="Supervisor id" class="f1-last-name form-control" id="f1-last-name" value="{{$userData->supervisor_id}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-last-name">Equipments</label>

                                    <input type="text" name="equipments" placeholder="Equepments you have been given(Include password if any)" class="f1-last-name form-control" id="f1-last-name"
                                    value="{{$userData->equipments}}" >



                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Provide you personal data</h4>
                                <div class="form-group">
                                    <label class="" for="f1-email">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="f1-email form-control" id="f1-email" value="{{$userData->name}}">
                                </div>
                                
                                <div class="form-group">
                                    <label class="" for="f1-email">Father Name</label>
                                    <input type="text" name="father_name" placeholder="Father Name" class="f1-email form-control" id="f1-email" value="{{$userData->father_name}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-email">Mother Name</label>
                                    <input type="text" name="mother_name" placeholder="Mother Name" class="f1-email form-control" id="f1-email" value="{{$userData->mother_name}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-email">Spouse Name</label>
                                    <input type="text" name="spouse_name" placeholder="Spouse Name" class="f1-email form-control" id="f1-email" value="{{$userData->spouse_name}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-about-yourself">Blood Group</label>
                                    <select name="blood_group" id="" class="form-control">
                                        <option value="">Select your blood group</option>
                                        <option value="A+" {{$userData->blood_group == 'A+' ? 'selected' : ''}}>A+</option>
                                        <option value="A-" {{$userData->blood_group == 'A-' ? 'selected' : ''}}>A-</option>
                                        <option value="B+" {{$userData->blood_group == 'B+' ? 'selected' : ''}}>B+</option>
                                        <option value="B-" {{$userData->blood_group == 'B-' ? 'selected' : ''}}>B-</option>
                                        <option value="O+" {{$userData->blood_group == 'O+' ? 'selected' : ''}}>O+</option>
                                        <option value="O-" {{$userData->blood_group == 'O-' ? 'selected' : ''}}>O-</option>
                                        <option value="AB+" {{$userData->blood_group == 'AB+' ? 'selected' : ''}}>AB+</option>
                                        <option value="AB-" {{$userData->blood_group == 'AB-' ? 'selected' : ''}}>AB-</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-email">Nationality</label>
                                    <input type="text" name="nationality" placeholder="Nationality" class="f1-email form-control" id="f1-email" value="{{$userData->nationality}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-email">Religion</label>
                                    <input type="text" name="religion" placeholder="Religion" class="f1-email form-control" id="f1-email" value="{{$userData->religion}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-google-plus">National ID no</label>
                                    <input type="text" name="nid_no" placeholder="National ID no." class="f1-google-plus form-control" id="f1-google-plus" value="{{$userData->nid_no}}">
                                </div>
                                <div class="form-group">
                                    <label class="label-inline" for="f1-email">NID Photo</label>
                                    <input type="file" name="nid_image" class="f1-email form-control" id="f1-email">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-email">Present Address</label>
                                    <textarea class="form-control" name="present_address" placeholder="Provide your present address" >{{$userData->present_address}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-email">Permanent Address</label>
                                    <textarea class="form-control" name="permanent_address" placeholder="Provide your permanent address">{{$userData->permanent_address}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label class="label-inline" for="f1-email">Avater</label>
                                    <input type="file" name="avater" class="form-control" id="f1-email">
                                </div>
                                
                                
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Provide you contact information</h4>
                                <div class="form-group">
                                    <label class="" for="f1-facebook">Mobile</label>
                                    <input type="text" name="mobile" placeholder="Mobile number" class="f1-facebook form-control" id="f1-facebook" value="{{$userData->mobile}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-facebook">Alternate Mobile</label>
                                    <input type="text" name="alt_mobile" placeholder="Mobile number" class="f1-facebook form-control" id="f1-facebook" value="{{$userData->alt_mobile}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-facebook">Guardian Mobile</label>
                                    <input type="text" name="guardian_mobile" placeholder="Guardian Mobile number" class="f1-facebook form-control" id="f1-facebook" value="{{$userData->guardian_mobile}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-twitter">Skype</label>
                                    <input type="text" name="skype" placeholder="Skype" class="f1-twitter form-control" id="f1-twitter" value="{{$userData->skype}}">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-google-plus">Linked in</label>
                                    <input type="text" name="linkedin" placeholder="Linkedin" class="f1-google-plus form-control" id="f1-google-plus" value="{{$userData->linkedin}}">
                                </div>
                                
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Update</button>
                                </div>
                            </fieldset>
                    	
                    	</form>
                    </div>
                </div>


                 {{-- Academic portion --}}

                <div class="row" id="academicbody" style="display: none;">
                    <div class="col-md-11">

                        
                            <h1 class="brand">Edit Academic Information</h1>
                           
                                <form role="form" action="{{Request::segment(2) == null ? url('edit-academic-data') : url('edit-academic-data/'.Request::segment(2)) }}" method="post" class="f1 form-horizontal" enctype="multipart/form-data" id="myForm">
                                {{csrf_field()}}

                                   
                                    <div id="section-wrapper">

                                    @if(sizeof($academicData) <= 0)
                                    <div class="panel panel default" id="section-container">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                            <label class="" for="f1-first-name">Degree</label>
                                                <select name="degree[]" id="" class="form-control ">
                                                    <option value="">Select a degree</option>
                                                    <option value="1" >PSC</option>
                                                    <option value="2" >JSC</option>
                                                    <option value="3" >SSC</option>
                                                    <option value="4"  >HSC</option>
                                                    <option value="5" >Bachelors</option>
                                                    <option value="6" >Masters</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">Institute Name</label>
                                                <input type="text" name="institute_name[]" placeholder="Institute name" class="f1-first-name form-control" id="f1-first-name" > 
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">Subject/Major</label>
                                                <input type="text" name="subject[]" placeholder="Subject/Major" class="f1-first-name form-control" id="f1-first-name" > 
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">Session</label>
                                                <input type="text" name="session[]" placeholder="Session Ex- 2011-12" class="f1-first-name form-control" id="f1-first-name" > 
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">CGPA/Division</label>
                                                <input type="text" name="cgpa[]" placeholder="CGPA/Division (Ex- 4.88 out of 5 or 1st division)" class="f1-first-name form-control" id="f1-first-name"> 
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">Board</label>
                                                <input type="text" name="board[]" placeholder="Board" class="f1-first-name form-control" id="f1-first-name" > 
                                            </div>
                                        </div>
                                                </div>
                                            </div>
                                            
                                    </div>
                                    
                                

                                    @endif
                                     @foreach($academicData as $key => $ad)
                                        <div class="panel panel-default" id="section-container">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <div class="form-group">
                                            <label class="" for="f1-first-name">Degree</label>
                                                <select name="degree[]" id="" class="form-control ">
                                                    <option value="">Select a degree</option>
                                                    <option value="1" {{$ad->degree == '1' ? 'selected' : ''}}>PSC</option>
                                                    <option value="2" {{$ad->degree == '2' ? 'selected' : ''}}>JSC</option>
                                                    <option value="3" {{$ad->degree == '3' ? 'selected' : ''}}>SSC</option>
                                                    <option value="4"  {{$ad->degree == '4' ? 'selected' : ''}}>HSC</option>
                                                    <option value="5" {{$ad->degree == '5' ? 'selected' : ''}}>Bachelors</option>
                                                    <option value="6" {{$ad->degree == '6' ? 'selected' : ''}}>Masters</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">Institute Name</label>
                                                <input type="text" name="institute_name[]" placeholder="Institute name" class="f1-first-name form-control" id="f1-first-name" value="{{$ad->institute}}"> 
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">Subject/Major</label>
                                                <input type="text" name="subject[]" placeholder="Subject/Major" class="f1-first-name form-control" id="f1-first-name" value="{{$ad->subject}}"> 
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">Session</label>
                                                <input type="text" name="session[]" placeholder="Session Ex- 2011-12" class="f1-first-name form-control" id="f1-first-name" value="{{$ad->session}}"> 
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">CGPA/Division</label>
                                                <input type="text" name="cgpa[]" placeholder="CGPA/Division (Ex- 4.88 out of 5 or 1st division)" class="f1-first-name form-control" id="f1-first-name" value="{{$ad->CGPA}}"> 
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="f1-first-name">Board</label>
                                                <input type="text" name="board[]" placeholder="Board" class="f1-first-name form-control" id="f1-first-name" value="{{$ad->board}}"> 
                                            </div>
                                            </div>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                        
                                    @endforeach
                                    

                                    </div>
                                    <div class="btn-group pull-right" role="group">
                                        <button type="button" id="add" class="btn btn-primary"><span class="fa fa-plus-circle"></span></button>
                                        <button type="button" id="delete" class="btn btn-danger" disabled><span class="fa fa-minus-circle"></span></button>
                                        <button type="submit" id="submit" class="btn btn-success">Save</button>
                                    </div>
                                    

                                    
    
                                    
                                </form>
                            </div>
                        
                </div>



                {{-- Experience portion --}}
                <div class="row" id="experiencebody" style="display: none;">
                    <div class="col-md-8 col-md-offset-1">
                        <h1 class="brand">Edit Experience Information</h1>   
                        <form action="{{Request::segment(2) == null ? url('edit-experience') : url('edit-experience/'.Request::segment(2)) }}" method="post">
                          {{csrf_field()}}
                          <div id="exp-wraper">

                            @if(sizeof($expData)<= 0)
                            <div class="panel panel-default" id="exp-container">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label for="workplace">Workplace</label>
                                                <input type="text" name="worksplace[]" class="form-control" placeholder="Name of the worksplace">
                                            </div>
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input type="text" name="designation[]" class="form-control" placeholder="Your designation of that institution">
                                            </div>
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <textarea name="address[]" id="" cols="30" rows="10" class="form-control" placeholder="Address of the worksplace you have been working"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description[]" id="" cols="30" rows="10" class="form-control" placeholder="Desribe what were you doing there"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="duration">Duration</label>
                                                <input type="text" name="duration[]" class="form-control" placeholder="How long you have been working there">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
        

                            @endif
                            @foreach($expData as $exp)
                            <div class="panel panel-default" id="exp-container">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label for="workplace">Workplace</label>
                                                <input type="text" name="worksplace[]" class="form-control" placeholder="Name of the worksplace" value="{{$exp->worksplace}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input type="text" name="designation[]" class="form-control" placeholder="Your designation of that institution" value="{{$exp->designation}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <textarea name="address[]" id="" cols="30" rows="10" class="form-control" placeholder="Address of the worksplace you have been working">{{$exp->address}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description[]" id="" cols="30" rows="10" class="form-control" placeholder="Desribe what were you doing there">{{$exp->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="duration">Duration</label>
                                                <input type="text" name="duration[]" class="form-control" placeholder="How long you have been working there" value="{{$exp->duration}}">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endforeach   
                                
                          </div>
                            <div class="btn-group pull-right" role="group">
                                <button type="button" id="addExp" class="btn btn-primary"><span class="fa fa-plus-circle"></span></button>
                                <button type="button" id="deleteExp" class="btn btn-danger" disabled><span class="fa fa-minus-circle"></span></button>
                                <button type="submit" id="submit" class="btn btn-success">Save</button>
                            </div>

                      </form>
                    </div>
                </div>


                {{-- skills portion --}}
    
                 <div class="row" id="skillbody" style="display: none;">
                    <div class="col-md-11 ">
                        <h1 class="brand">Add skills</h1>
                        <div class="row" id="">
                            <form action="{{Request::segment(2) == null ? url('edit-skills') : url('edit-skills/'.Request::segment(2)) }}" method="post" class="form-horizontal">
                                {{csrf_field()}}

                                <div class="row" id="skillContainer">
                                    @if(sizeof($skillData) <= 0)
                                        <div class="form-group" id="skillField">

                                            <input type="text" name="skills[]"  placeholder="Skill name (e.g. PHP, Java, JavaScript etc.)" id="skill" class="form-control" >
                                            <select name="proficiency[]" class="form-control" id="" required>
                                                <option value="">Select proficiency level</option>
                                                <option value="100">Excellent</option>
                                                <option value="80">Good</option>
                                                <option value="60">Average</option>
                                                <option value="40">Satisfactory</option>
                                                <option value="20">Poor</option>
                                            </select>
                                        </div>


                                    @endif

                                    @foreach($skillData as $skill)
                                        <div class="col-md-3" id="skillField" style="margin-bottom: 10px;">
                                            <input type="text" name="skills[]"  placeholder="Skill name (e.g. PHP, Java, JavaScript etc.)" id="skill" class="form-control" value="{{$skill->skills}}">
                                            <select name="proficiency[]" id="" class="form-control" required>
                                                <option value="">Select proficiency level</option>
                                                <option value="100">Excellent</option>
                                                <option value="80">Good</option>
                                                <option value="60">Average</option>
                                                <option value="40">Satisfactory</option>
                                                <option value="20">Poor</option>
                                            </select>
                                        </div>

                                    @endforeach


                                </div>
                                <div class="btn-group pull-right" role="group">
                                    <button type="button" id="addField" class="btn btn-primary"><span class="fa fa-plus-circle"></span></button>
                                    <button type="button" id="deleteField" class="btn btn-danger" disabled><span class="fa fa-minus-circle"></span></button>
                                    <button type="submit" id="submit" class="btn btn-success">Save</button>
                                </div>




                            </form>

                        </div>


                    </div>
                    
                </div>

                {{-- training section --}}
                 <div class="row" id="trainingbody" style="display: none;">
                    <div class="col-md-8 col-md-offset-1">
                        <h1 class="brand">Edit Training Information</h1> 
                        <form action="{{Request::segment(2) == null ? url('edit-training') : url('edit-training/'.Request::segment(2)) }}" method="post" class="form-horizontal">
                        {{csrf_field()}}

                            <div id="training-wraper">

                                @if(sizeof($trainingData) <= 0)
                                <div class="panel panel-default" id="training-panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-10 col md-offset-1 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label for="title">Training Title</label>
                                                    <input type="text" class="form-control" name="title[]" autofocus >
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                       
                                                        <div class="form-group">
                                                            <label for="institute">Institute</label>
                                                            <input type="text" class="form-control" name="institute[]" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="year">Year</label>
                                                            <input type="text" class="form-control" name="year[]" >
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        
                                                       <div class="form-group">
                                                            <label for="type">Training Type</label>
                                                            <input type="text" class="form-control" name="type[]" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="duration">Duration</label>
                                                            <input type="text" class="form-control" name="duration[]" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description[]" placeholder="Type a short description of your traing course"></textarea>
                                                </div> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @endif



                                @foreach($trainingData as $training)
                                <div class="panel panel-default" id="training-panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-10 col md-offset-1 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label for="title">Training Title</label>
                                                    <input type="text" class="form-control" name="title[]" autofocus value="{{$training->title}}">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                       
                                                        <div class="form-group">
                                                            <label for="institute">Institute</label>
                                                            <input type="text" class="form-control" name="institute[]" value="{{$training->institute}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="year">Year</label>
                                                            <input type="text" class="form-control" name="year[]" value="{{$training->year}}">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        
                                                       <div class="form-group">
                                                            <label for="type">Training Type</label>
                                                            <input type="text" class="form-control" name="type[]" value="{{$training->type}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="duration">Duration</label>
                                                            <input type="text" class="form-control" name="duration[]" value="{{$training->duration}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description[]" placeholder="Type a short description of your traing course">{{$training->description}}</textarea>
                                                </div> 
                                                
                                            </div>
                                        </div>
                                        



                                    </div>
                                </div> 
                                @endforeach   
                            </div>
                            <div class="btn-group pull-right" role="group">
                                <button type="button" id="addTraining" class="btn btn-primary"><span class="fa fa-plus-circle"></span></button>
                                <button type="button" id="deleteTraining" class="btn btn-danger" disabled><span class="fa fa-minus-circle"></span></button>
                                <button type="submit" id="submit" class="btn btn-success">Save</button>
                            </div>

                        </form>
                    </div>
                    
                </div>

                {{-- reference section --}}

                <div class="row" id="referencebody" style="display: none;">
                    <div class="col-md-8 col-md-offset-1">
                        <h1 class="brand">Edit Reference Information</h1>
                        <form action="{{Request::segment(2) == null ? url('edit-reference') : url('edit-reference/'.Request::segment(2)) }}" method="post" class="form-horizontal">
                            {{csrf_field()}}

                            <div id="reference-wraper">

                                @if(sizeof($refData) <= 0)
                                    <div class="panel panel-default" id="reference-panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-10 col-sm-10 col md-offset-1 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label for="title">Name</label>
                                                        <input type="text" class="form-control" name="name[]" autofocus >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="designation">Designation</label>
                                                        <input type="text" class="form-control" name="designation[]" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Mobile">Mobile</label>
                                                        <input type="text" class="form-control" name="mobile[]" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" name="email[]" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" name="description[]" placeholder="Type a short description of your traing course"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="relation">Relation</label>
                                                        <input class="form-control" name="relation[]" placeholder="Relation with you.">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                @endif



                                @foreach($refData as $ref)
                                    <div class="panel panel-default" id="reference-panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-10 col-sm-10 col md-offset-1 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label for="title">Name</label>
                                                        <input type="text" class="form-control" name="name[]" autofocus value="{{$ref->name}}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="designation">Designation</label>
                                                        <input type="text" class="form-control" name="designation[]" value="{{$ref->designation}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Mobile">Mobile</label>
                                                        <input type="text" class="form-control" name="mobile[]" value="{{$ref->mobile}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" name="email[]" value="{{$ref->email}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" name="description[]" placeholder="Type a short description of the person">{{$ref->description}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="relation">Relation</label>
                                                        <input class="form-control" name="relation[]" placeholder="Relation with you." value="{{$ref->relation}}">
                                                    </div>

                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">


                                <div class="btn-group pull-right" role="group">
                                    <button type="button" id="addReference" class="btn btn-primary"><span class="fa fa-plus-circle"></span></button>
                                    <button type="button" id="deleteReference" class="btn btn-danger" disabled><span class="fa fa-minus-circle"></span></button>
                                    <button type="submit" id="submit" class="btn btn-success">Save</button>
                                </div>


                            </div>
                        </form>
                    </div>

                </div>

                  
            </div>
        </div>
    </div>
@section('scripts')
<script src="{{URL::asset('js/jquery.backstretch.js')}}"></script>
<script src="{{URL::asset('js/jquery.retina-1.1.0.min.js')}}"></script>
<script src="{{URL::asset('js/scripts.js')}}"></script>
<script src="{{URL::asset('js/mysection.js')}}"></script>
<script>
    $(document).ready(function(){

        sessionStorage.refClick = 0;
        sessionStorage.acClick = 0;
        sessionStorage.skillClick = 0;
        sessionStorage.trainingClick = 0;
        sessionStorage.expClick = 0;

        $('#add').click(function(){
            $('#section-container').clone().appendTo('#section-wrapper');
            $("#section-container:last-child").find('input').val('');
            $("#section-container:last-child").find('textarea').val('');

            sessionStorage.acClick = Number(sessionStorage.acClick) + 1;
            if(sessionStorage.acClick > 0){
                $("#delete").prop('disabled',false);
            }else{
                $("#delete").prop('disabled',true);
            }

        });





        $('#addField').click(function(){
            $('#skillField').clone().appendTo('#skillContainer');
            $("#skillField:last-child").find('input').val('');
            sessionStorage.skillClick = Number(sessionStorage.skillClick) + 1;
            if(sessionStorage.skillClick > 0){
                $("#deleteField").prop('disabled',false);
            }else{
                $("#deleteField").prop('disabled',true);
            }
        });


        $('#addTraining').click(function(){
            $('#training-panel').clone().appendTo('#training-wraper');
            $("#training-panel:last-child").find('input').val('');
            $("#training-panel:last-child").find('textarea').val('');

            sessionStorage.trainingClick = Number(sessionStorage.trainingClick) + 1;
            if(sessionStorage.trainingClick > 0){
                $("#deleteTraining").prop('disabled',false);
            }else{
                $("#deleteTraining").prop('disabled',true);
            }
        });

        $('#addReference').click(function(){
            $('#reference-panel').clone().appendTo('#reference-wraper');
            $("#reference-panel:last-child").find('input').val('');
            $("#reference-panel:last-child").find('textarea').val('');

            sessionStorage.refClick = Number(sessionStorage.refClick) + 1;
            if(sessionStorage.refClick > 0){
                $("#deleteReference").prop('disabled',false);
            }else{
                $("#deleteReference").prop('disabled',true);
            }


        });

        $('#addExp').click(function(){
            $('#exp-container').clone().appendTo('#exp-wraper');
            $("#exp-container:last-child").find('input').val('');
            $("#exp-container:last-child").find('textarea').val('');

            sessionStorage.expClick = Number(sessionStorage.expClick) + 1;
            if(sessionStorage.expClick > 0){
                $("#deleteExp").prop('disabled',false);
            }else{
                $("#deleteExp").prop('disabled',true);
            }
        });


        $('#deleteReference').click(function(){
            $('#reference-panel:last-child').remove();
            if(sessionStorage.refClick > 0)
                sessionStorage.refClick = Number(sessionStorage.refClick) - 1;
            else
                sessionStorage.refClick = 0;


            if(sessionStorage.refClick > 0){
                $("#deleteReference").prop('disabled',false);
            }else{
                $("#deleteReference").prop('disabled',true);
            }

        });

        $('#delete').click(function(){
            $('#section-container:last-child').remove();
            console.log("AC: "+sessionStorage.acClick);
            if(sessionStorage.acClick > 0)
                sessionStorage.acClick = Number(sessionStorage.acClick) - 1;
            else
                sessionStorage.acClick = 0;


            if(sessionStorage.acClick > 0){
                $("#delete").prop('disabled',false);
            }else{
                $("#delete").prop('disabled',true);
            }

        });

        $('#deleteExp').click(function(){
            $('#exp-container:last-child').remove();
            if(sessionStorage.expClick > 0)
                sessionStorage.expClick = Number(sessionStorage.expClick) - 1;
            else
                sessionStorage.expClick = 0;


            if(sessionStorage.expClick > 0){
                $("#deleteExp").prop('disabled',false);
            }else{
                $("#deleteExp").prop('disabled',true);
            }

        });

        $('#deleteField').click(function(){
            $('#skillField:last-child').remove();
            if(sessionStorage.skillClick > 0)
                sessionStorage.skillClick = Number(sessionStorage.skillClick) - 1;
            else
                sessionStorage.skillClick = 0;


            if(sessionStorage.skillClick > 0){
                $("#deleteField").prop('disabled',false);
            }else{
                $("#deleteField").prop('disabled',true);
            }

        });

        $('#deleteTraining').click(function(){
            $('#training-panel:last-child').remove();
            if(sessionStorage.trainingClick > 0)
                sessionStorage.trainingClick = Number(sessionStorage.trainingClick) - 1;
            else
                sessionStorage.trainingClick = 0;


            if(sessionStorage.trainingClick > 0){
                $("#deleteTraining").prop('disabled',false);
            }else{
                $("#deleteTraining").prop('disabled',true);
            }

        });

    });





</script>
@endsection

@endsection

