@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')
<link rel="stylesheet" href="{{URL::asset('css/form-elements.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/style1.css')}}">
@endsection


@section('content')

<div class="col-md-12">

   <!-- Top content -->
   <div class="top-content">
    <div class="container">
        @include('layouts.employee-menu')


        <div class="row" id="pibody" style="display: block;">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
               <form role="form" action="{{url('add-details')}}" method="post" class="f1" attendance>
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
                     <input type="date" name="join_date" placeholder="Join date" class="f1-first-name form-control" id="f1-first-name"> 
                 </div>
                 <div class="form-group">
                    <label class="" for="f1-last-name">Job Title</label>
                    <input type="text" name="job_title" placeholder="Job Title" class="f1-last-name form-control" id="f1-last-name">
                </div>
                <div class="form-group">
                    <label class="" for="f1-about-yourself">Job Type</label>
                    <select name="job_type" id="" class="form-control">
                       <option value="">Select job type</option>
                       <option value="Full Time">Full Time</option>
                       <option value="Part Time">Part Time</option>
                       <option value="Intern">Intern</option>
                   </select>
               </div>
               <div class="form-group">
                <label class="" for="f1-last-name">Department</label>
                <input type="text" name="department" placeholder="Write your department name" class="f1-last-name form-control" id="f1-last-name">
            </div>
            <div class="form-group">
                <label class="" for="f1-last-name">Account no</label>
                <input type="text" name="account_no" placeholder="Accouont no." class="f1-last-name form-control" id="f1-last-name">
            </div>
            <div class="form-group">
                <label class="" for="f1-last-name">Supervisor</label>
                <input type="text" name="supervisor_id" placeholder="Supervisor id" class="f1-last-name form-control" id="f1-last-name">
            </div>
            <div class="f1-buttons">
                <button type="button" class="btn btn-next">Next</button>
            </div>
        </fieldset>

        <fieldset>
            <h4>Provide you personal data</h4>
            <div class="form-group">
                <label class="" for="f1-email">First Name</label>
                <input type="text" name="first_name" placeholder="First Name" class="f1-email form-control" id="f1-email">
            </div>
            <div class="form-group">
                <label class="" for="f1-email">Last Name</label>
                <input type="text" name="last_name" placeholder="Last Name" class="f1-email form-control" id="f1-email">
            </div>
            <div class="form-group">
                <label class="" for="f1-email">Father's Name</label>
                <input type="text" name="father_name" placeholder="Father's Name" class="f1-email form-control" id="f1-email">
            </div>
            <div class="form-group">
                <label class="" for="f1-email">Mother's Name</label>
                <input type="text" name="mother_name" placeholder="Mother's Name" class="f1-email form-control" id="f1-email">
            </div>
            <div class="form-group">
                <label class="" for="f1-email">Spouse Name (If any)</label>
                <input type="text" name="spouse_name" placeholder="Spouse Name" class="f1-email form-control" id="f1-email">
            </div>
            <div class="form-group">
                <label class="" for="f1-about-yourself">Blood Group</label>
                <select name="blood_group" id="" class="form-control">
                    <option value="">Select your blood group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <div class="form-group">
                <label class="" for="f1-email">Present Address</label>
                <textarea class="form-control" name="present_address" placeholder="Provide your present address"></textarea> 
            </div>
            <div class="form-group">
                <label class="" for="f1-email">Permanent Address</label>
                <textarea class="form-control" name="permanent_address" placeholder="Provide your permanent address"></textarea> 
            </div>
            <div class="form-group">
                <label class="" for="f1-email">Nationality</label>
                <input type="text" name="nationality" placeholder="Nationality" class="f1-email form-control" id="f1-email">
            </div>
            <div class="form-group">
                <label class="" for="f1-email">Religion</label>
                <input type="text" name="religion" placeholder="Religion" class="f1-email form-control" id="f1-email">
            </div>
            <div class="form-group">
                <label class="" for="f1-google-plus">National ID no</label>
                <input type="text" name="nid_no" placeholder="National ID no." class="f1-google-plus form-control" id="f1-google-plus">
            </div>
            <div class="form-group">
                <label class="label-inline" for="f1-email">NID Photo</label>
                <input type="file" name="nid_image" class="f1-email form-control" id="f1-email">
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
                <input type="text" name="mobile" placeholder="Mobile number" class="f1-facebook form-control" id="f1-facebook">
            </div>
            <div class="form-group">
                <label class="" for="f1-facebook">Alternative Mobile (If any) </label>
                <input type="text" name="alt_mobile" placeholder="Alternative Mobile number" class="f1-facebook form-control" id="f1-facebook">
            </div>
            <div class="form-group">
                <label class="" for="f1-facebook">Guardian Mobile</label>
                <input type="text" name="guardian_mobile" placeholder="Guardian Mobile number" class="f1-facebook form-control" id="f1-facebook">
            </div>
            <div class="form-group">
                <label class="" for="f1-twitter">Skype</label>
                <input type="text" name="skype" placeholder="Skype" class="f1-twitter form-control" id="f1-twitter">
            </div>
            <div class="form-group">
                <label class="" for="f1-google-plus">Linked in</label>
                <input type="text" name="linkedin" placeholder="Linkedin" class="f1-google-plus form-control" id="f1-google-plus">
            </div>

            <div class="f1-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>
        </fieldset>

    </form>
</div>
</div>


{{-- Academic portion --}}

<div class="row" id="academicbody" style="display: none;">
   <div class="col-md-6 col-md-offset-2">


    <h1 class="brand">Academic Information</h1>

    <form role="form" action="{{url('add-academic-data')}}" method="post" class="f1 form-horizontal" enctype="multipart/form-data" id="myForm">
        {{csrf_field()}}
        <div id="section-wrapper">
            <div class="panel panel-default" id="section-container">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="" for="f1-first-name">Degree</label>
                                    <select name="degree[]" id="" class="form-control ">
                                        <option value="">Select a degree</option>
                                        <option value="psc">PSC</option>
                                        <option value="jsc">JSC</option>
                                        <option value="ssc">SSC</option>
                                        <option value="hsc">HSC</option>
                                        <option value="bachelors">Bachelors</option>
                                        <option value="masters">Masters</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-first-name">Institute Name</label>
                                    <input type="text" name="institute_name[]" placeholder="Institute name" class="f1-first-name form-control" id="f1-first-name"> 
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-first-name">Subject/Major</label>
                                    <input type="text" name="subject[]" placeholder="Subject/Major" class="f1-first-name form-control" id="f1-first-name"> 
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-first-name">Session</label>
                                    <input type="text" name="session[]" placeholder="Session Ex- 2011-12" class="f1-first-name form-control" id="f1-first-name"> 
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-first-name">CGPA/Division</label>
                                    <input type="text" name="cgpa[]" placeholder="CGPA/Division (Ex- 4.88 out of 5 or 1st division)" class="f1-first-name form-control" id="f1-first-name"> 
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-first-name">Board</label>
                                    <input type="text" name="board[]" placeholder="Board" class="f1-first-name form-control" id="f1-first-name"> 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>



        <div class="form-group">
           <input type="button" id="add" value="Add another section" class="btn btn-primary">
           <input type="submit" id="add" value="Submit" class="btn btn-danger">
       </div>
   </form>


</div>

</div>


{{-- Experience portion --}}
<div class="row" id="experiencebody" style="display: none;">
   <div class="col-md-8 col-md-offset-1">
      <h1 class="brand">Experience Information</h1>	
      <form action="{{url('add-experience')}}" method="post">
          {{csrf_field()}}
          <div id="exp-wraper">
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
                
          </div>
            <div class="form-group">
               <input type="button" id="addExp" value="Add another section" class="btn btn-primary">
               <input type="submit" id="add" value="Submit" class="btn btn-danger">
            </div>
      </form>
  </div>

</div>

{{-- skills portion --}}

<div class="row" id="skillbody" style="display: none;">
   <div class="col-md-8 col-md-offset-1">
      <h1 class="brand">Add skills</h1>	
      <form action="{{url('/add-skills')}}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <div id="skillContainer">
            <div class="form-group" id="skillField">
                <label for="skill" class="form-label">Skill</label>
                <input type="text" name="skills[]"  placeholder="Skill name (e.g. PHP, Java, JavaScript etc.)" id="skill" class="form-control">
            </div>    
        </div>

        <div class="form-group">

            <button type="button" id="addField" class="btn btn-primary"><span class="fa fa-plus"></span> Add</button>
            <input type="submit" id="subtmi" class="btn btn-danger" value="Save">
        </div>

    </form>
</div>

</div>

{{-- training section --}}
<div class="row" id="trainingbody" style="display: none;">
   <div class="col-md-8 col-md-offset-1">
      <h1 class="brand">Training Information</h1>
      <form action="{{url('add-training')}}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <div id="training-wraper">
            <div class="panel panel-default" id="training-panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col md-offset-1 col-sm-offset-1">
                            <div class="form-group">
                                <label for="title">Training Title</label>
                                <input type="text" class="form-control" name="title[]" autofocus>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="institute">Institute</label>
                                        <input type="text" class="form-control" name="institute[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <input type="text" class="form-control" name="year[]">
                                    </div>

                                </div>
                                <div class="col-md-6">

                                 <div class="form-group">
                                    <label for="type">Training Type</label>
                                    <input type="text" class="form-control" name="type[]">
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" class="form-control" name="duration[]">
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
    </div>

    <div class="form-group">

        <button type="button" id="addTraining" class="btn btn-primary"><span class="fa fa-plus"></span> Add</button>
        <input type="submit" id="subtmi" class="btn btn-danger" value="Save">
    </div>
</form>

</div>

</div>
{{-- end training section --}}

{{-- reference section --}}

<div class="row" id="referencebody" style="display: none;">
   <div class="col-md-8 col-md-offset-1">
      <h1 class="brand">Reference Information</h1>	
  </div>

</div>



</div>
</div>
</div>
@section('scripts')
<script src="{{URL::asset('js/jquery.backstretch.js')}}"></script>
<script src="{{URL::asset('js/jquery.retina-1.1.0.min.js')}}"></script>
<script src="{{URL::asset('js/scripts.js')}}"></script>
<script src="{{URL::asset('js/section-selector.js')}}"></script>


<script>
	$('#add').click(function(){
		$('#section-container').clone().appendTo('#section-wrapper');
	});
    $('#addField').click(function(){
        $('#skillField').clone().appendTo('#skillContainer');
    });
    $('#addTraining').click(function(){
        $('#training-panel').clone().appendTo('#training-wraper');
    });
    $('#addExp').click(function(){
        $('#exp-container').clone().appendTo('#exp-wraper');
    });
</script>
@endsection

@endsection

