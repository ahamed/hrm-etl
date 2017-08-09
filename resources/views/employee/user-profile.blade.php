@extends('layouts.app')

@section('title','HRM-Ezzetech | User profile')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('css/form-elements.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/timeline-reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/timeline-style.css')}}"/>

    <style>
        .refTab td, th {
            border-top: none !important;
            border-bottom: none;
            border: none;
        }

        .ref {
            width: 490px !important;
            /*box-shadow: 2px 2px 4px #0a2b1d;*/
            background: #E9F0F5;
            padding: 20px;
            height: 280px !important;
        }

        /*style progressbar*/
        .progress {
            height: 35px !important;

        }
        .progress .skill {
            font: normal 15px "Open Sans Web";
            line-height: 35px;
            padding: 0;
            margin: 0 0 0 20px;
            text-transform: uppercase;
            color: white;
            font-weight: bolder;

        }
        .progress .skill .val {
            float: right;
            font-style: normal;
            margin: 0 20px 0 0;
        }

        .progress-bar {
            text-align: left;
            transition-duration: 3s;
        }




    </style>

@endsection

@section('content')


    <div class="col-md-12">

        <div class="top-content">

            @if(Auth::user()->role == 1)

                <div class="container">
                    @include('layouts.employee-menu')
                    @if(sizeof($employees) > 0)
                        <div class="row" id="pibody">

                            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                                <form role="form" class="f1 form-horizontal">
                                    @if($employees->image_url == null)
                                        <img src="{{URL::asset('/images/nota.jpg')}}" alt="" width="150" height="150"
                                             class="img">
                                    @else
                                        <img src="{{URL::asset($employees->image_url)}}" alt="" width="150" height="150"
                                         class="img img-circle">
                                    @endif
                                    <h4 class="brand">{{$employees->name}}</h4>
                                    <div class="f1-steps">
                                        <div class="f1-progress">
                                            <div class="f1-progress-line" data-now-value="16.66"
                                                 data-number-of-steps="3" style="width: 16.66%;"></div>
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
                                        <h4>Your current job description</h4>

                                        <table class="table table-responsive">
                                            <tr>
                                                <td class="brand">Join Date</td>
                                                <td class="brand text-small">{{date('d F, Y',strtotime($employees->join_date)) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Job Title</td>
                                                <td class="brand text-small">{{$employees->job_title}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Job Type</td>
                                                <td class="brand text-small">{{$employees->job_type}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Department</td>
                                                <td class="brand text-small">{{$employees->department}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Account Number</td>
                                                <td class="brand text-small">{{$employees->account_no}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Supervisor</td>
                                                <td class="brand text-small">{{sizeof($supervisor) > 0 ? $supervisor->name : "N/A"}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">{{$employees->job_type == "Innovation Team" ? 'Allowance' : 'Basic Salary'}}</td>
                                                <td class="brand text-small">{{$employees->basic}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Loan</td>
                                                <td class="brand text-small">{{$employees->loan}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Equipments</td>
                                                <td class="brand text-small">{{$employees->equipments}}</td>
                                            </tr>

                                        </table>
                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-next">Next</button>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <h4>Here you personal data</h4>
                                        <table class="table table-responsive">
                                            <tr>
                                                <td class="brand">Name</td>
                                                <td class="brand text-small">{{$employees->name}}</td>
                                            </tr>

                                            <tr>
                                                <td class="brand">Father Name</td>
                                                <td class="brand text-small">{{$employees->father_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Mother Name</td>
                                                <td class="brand text-small">{{$employees->mother_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Spouse Name</td>
                                                <td class="brand text-small">{{$employees->spouse_name == "" ? "N/A" : $employees->spouse_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Blood Group</td>
                                                <td class="brand text-small"
                                                    style="color: red;">{{$employees->blood_group}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Nationality</td>
                                                <td class="brand text-small">{{$employees->nationality}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Religion</td>
                                                <td class="brand text-small">{{$employees->religion}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">National ID</td>
                                                <td class="brand text-small"><img
                                                            src="{{URL::asset($employees->nid_url)}}" alt=""
                                                            width="250" height="150"></td>
                                            </tr>
                                            <tr>
                                                <td class="brand">National ID no.</td>
                                                <td class="brand text-small">{{$employees->nid_no}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Present Address</td>
                                                <td class="brand text-small">{{$employees->present_address}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Permanent Address</td>
                                                <td class="brand text-small">{{$employees->permanent_address}}</td>
                                            </tr>


                                        </table>


                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-previous">Previous</button>
                                            <button type="button" class="btn btn-next">Next</button>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <h4>Here you contact information</h4>

                                        <table class="table table-responsive">
                                            <tr>
                                                <td class="brand">Mobile</td>
                                                <td class="brand text-small">{{$employees->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Alternative Mobile</td>
                                                <td class="brand text-small">{{$employees->alt_mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Guardian Mobile</td>
                                                <td class="brand text-small">{{$employees->guardian_mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Email</td>
                                                <td class="brand text-small">{{$employees->email}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">skype</td>
                                                <td class="brand text-small">{{$employees->skype}}</td>
                                            </tr>
                                            <tr>
                                                <td class="brand">Linkedin</td>
                                                <td class="brand text-small">{{$employees->linkedin}}</td>
                                            </tr>

                                        </table>

                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-previous">Previous</button>
                                        </div>
                                    </fieldset>

                                </form>
                            </div>
                        </div>
                    @endif




                    {{-- Academic portion --}}
                    <div class="row" id="academicbody" style="display: none;">


                        <div class="col-md-11" id="timeline-body">
                            <div class="cd-container" id="cd-timeline">

                                @foreach($academics as $key => $academy)
                                    @if($key % 2 == 0)
                                        <div class="cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture"
                                                 style="text-align: center; color: white;">
                                                    <span class="fa fa-graduation-cap fa-2x"
                                                          style="margin-top: 15px;"></span>
                                            </div> <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h2>
                                                    @if($academy->degree == '1')
                                                        {{"PSC "}}
                                                    @elseif($academy->degree == '2')
                                                        {{"JSC "}}
                                                    @elseif($academy->degree == '3')
                                                        {{"SSC "}}
                                                    @elseif($academy->degree == '4')
                                                        {{"HSC "}}
                                                    @elseif($academy->degree == '5')
                                                        {{"Bachelors "}}
                                                    @elseif($academy->degree == '6')
                                                        {{"Masters "}}
                                                    @endif
                                                    in {{ucfirst($academy->subject)}}</h2>
                                                <p>From {{$academy->institute}}</p>
                                                <p>CGPA : {{$academy->CGPA}}</p>
                                                <p>Board : {{$academy->board}}</p>
                                                <span class="cd-date">Session : {{$academy->session}}</span>
                                            </div> <!-- cd-timeline-content -->
                                        </div> <!-- cd-timeline-block -->
                                    @else
                                        <div class="cd-timeline-block">
                                            <div class="cd-timeline-img cd-movie"
                                                 style="text-align: center; color: white;">
                                                    <span class="fa fa-graduation-cap fa-2x"
                                                          style="margin-top: 15px;"></span>
                                            </div> <!-- cd-timeline-img -->

                                            <div class="cd-timeline-content">
                                                <h2>
                                                    @if($academy->degree == '1')
                                                        {{"PSC "}}
                                                    @elseif($academy->degree == '2')
                                                        {{"JSC "}}
                                                    @elseif($academy->degree == '3')
                                                        {{"SSC "}}
                                                    @elseif($academy->degree == '4')
                                                        {{"HSC "}}
                                                    @elseif($academy->degree == '5')
                                                        {{"Bachelors "}}
                                                    @elseif($academy->degree == '6')
                                                        {{"Masters "}}
                                                    @endif

                                                    in {{ucfirst($academy->subject)}}</h2>
                                                <p>From {{$academy->institute}}</p>
                                                <p>CGPA : {{$academy->CGPA}}</p>
                                                <p>Board : {{$academy->board}}</p>
                                                <span class="cd-date">Session : {{$academy->session}}</span>
                                            </div> <!-- cd-timeline-content -->
                                        </div> <!-- cd-timeline-block -->

                                    @endif
                                @endforeach


                            </div>
                        </div>


                    </div>

                    {{-- Experience portion --}}
                    <div class="row" id="experiencebody" style="display: none;">
                        <div class="col-md-8 col-md-offset-1">

                            <h1 class="brand">Experience Information</h1>



                            <table class="table table-responsive table-bordered">
                                <tr>
                                    <th>Works place</th>
                                    <th>Designation</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                </tr>
                                @foreach($exps as $exp)
                                    <tr>
                                        <th>{{$exp->worksplace}}</th>
                                        <th>{{$exp->designation}}</th>
                                        <th>{{$exp->address}}</th>
                                        <th>{{$exp->description}}</th>
                                        <th>{{$exp->duration}}</th>
                                    </tr>


                                @endforeach
                            </table>
                        </div>

                    </div>

                    {{-- skills portion --}}

                    <div class="row" id="skillbody" style="display: none;">
                        <div class="col-md-8 col-md-offset-1">

                            <h1 class="brand">Valuable skills </h1>



                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        @foreach($skills as $skill)
                                            {{--<div class="col-md-4 col-sm-4" data-toggle="tooltip"
                                                 data-placement="top" title="{{$skill->skills}}">
                                                <div class="badge-wraper">
                                                    <span class="skill-badge">{{$skill->skills}}</span>
                                                    <a href="/delete-skill/{{$skill->id}}" class="times-right"><span
                                                                class="fa fa-times fa-2x"></span></a>
                                                </div>

                                            </div>--}}

                                                @if($skill->proficiency == "100")
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-primary active progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                            <span class="skill">{{$skill->skills}} <i class="val">Excellent</i></span>
                                                            <span class="sr-only">100% Complete (success)</span>
                                                        </div>
                                                    </div>

                                                @elseif($skill->proficiency == "80")
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-success active progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                            <span class="sr-only">80% Complete (success)</span>
                                                            <span class="skill">{{$skill->skills}} <i class="val">Good</i></span>
                                                        </div>
                                                    </div>

                                                @elseif($skill->proficiency == "60")
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-info active progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                            <span class="sr-only">60% Complete (success)</span>
                                                            <span class="skill">{{$skill->skills}} <i class="val">Average</i></span>
                                                        </div>
                                                    </div>

                                                @elseif($skill->proficiency == "40")
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-warning active progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                            <span class="sr-only">40% Complete (success)</span>
                                                            <span class="skill">{{$skill->skills}} <i class="val">Satisfactory</i></span>
                                                        </div>
                                                    </div>

                                                @elseif($skill->proficiency == "20")
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-danger active progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                            <span class="sr-only">20% Complete (success)</span>
                                                            <span class="skill">{{$skill->skills}} <i class="val">Poor</i></span>
                                                        </div>
                                                    </div>


                                                @endif



                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- training section --}}
                    <div class="row" id="trainingbody" style="display: none;">
                        <div class="col-md-8 col-md-offset-1">
                            <h1 class="brand">Training Information </h1>
                            <table class="table-responsive table table-bordered">
                                <tr>
                                    <th>Training Title</th>
                                    <th>Training Description</th>
                                    <th>Institute</th>
                                    <th>Course Type</th>
                                    <th>Year</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($trainings as $training)
                                    <tr class="training-table">
                                        <td>{{$training->title}}</td>
                                        <td>{{$training->description}}</td>
                                        <td>{{$training->institute}}</td>
                                        <td>{{$training->type}}</td>
                                        <td>{{$training->year}}</td>
                                        <td>{{$training->duration}}</td>
                                        <td><a href="delete-training/{{$training->id}}"
                                               class="times-right-training"><span class="fa fa-times fa-2x"></span></a>
                                        </td>
                                    </tr>


                                @endforeach
                            </table>
                        </div>

                    </div>

                    {{-- reference section --}}

                    <div class="row" id="referencebody" style="display: none;">
                        <div class="col-md-12">
                            <h4 class="brand">References</h4>
                            <div class="row">
                                @foreach($references as $ref)
                                    <div class="col-md-6">
                                        <div class="ref">
                                            <table class="table table-responsive refTab">
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>{{$ref->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Designation:</th>
                                                    <td>{{$ref->designation}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile:</th>
                                                    <td>{{$ref->mobile}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td>{{$ref->email=="" ? "N/A" : $ref->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description:</th>
                                                    <td>{{$ref->description}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Relation:</th>
                                                    <td>{{$ref->relation}}</td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>


                                @endforeach
                            </div>


                        </div>

                    </div>
                </div>


                <!-- The user portion  -->

            @else
                <div class="container">
                    @include('layouts.employee-menu')


                    <div class="row" id="pibody">

                        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                            <form role="form" class="f1 form-horizontal">
                                @if($employees->image_url == null)
                                    <img src="{{URL::asset('/images/nota.jpg')}}" alt="" width="150" height="150"
                                         class="img">
                                @else
                                    <img src="{{URL::asset($employees->image_url)}}" alt="" width="150" height="150"
                                         class="img img-circle">
                                @endif
                                <h4 class="brand">{{$employees->name}}</h4>



                                <div class="f1-steps">
                                    <div class="f1-progress">
                                        <div class="f1-progress-line" data-now-value="16.66"
                                             data-number-of-steps="3" style="width: 16.66%;"></div>
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
                                    <h4>Your current job description</h4>

                                    <table class="table table-responsive">
                                        <tr>
                                            <td class="brand">Join Date</td>
                                            <td class="brand text-small">{{date('d F, Y',strtotime($employees->join_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Job Title</td>
                                            <td class="brand text-small">{{$employees->job_title}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Job Type</td>
                                            <td class="brand text-small">{{$employees->job_type}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Department</td>
                                            <td class="brand text-small">{{$employees->department}}</td>
                                        </tr>

                                        <tr>
                                            <td class="brand">Account Number</td>
                                            <td class="brand text-small">{{$employees->account_no}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Supervisor</td>
                                            <td class="brand text-small">{{sizeof($supervisor) > 0 ? $supervisor->name : "N/A"}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">{{$employees->job_type == "Innovation Team" ? 'Allowance' : 'Basic Salary'}}</td>
                                            <td class="brand text-small">{{$employees->basic}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Loan</td>
                                            <td class="brand text-small">{{$employees->loan}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Equipments</td>
                                            <td class="brand text-small">{{$employees->equipments}}</td>
                                        </tr>

                                    </table>
                                    <div class="f1-buttons">
                                        <button type="button" class="btn btn-next">Next</button>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <h4>Here you personal data</h4>
                                    <table class="table table-responsive">
                                        <tr>
                                            <td class="brand">Name</td>
                                            <td class="brand text-small">{{$employees->name}}</td>
                                        </tr>

                                        <tr>
                                            <td class="brand">Father Name</td>
                                            <td class="brand text-small">{{$employees->father_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Mother Name</td>
                                            <td class="brand text-small">{{$employees->mother_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Spouse Name</td>
                                            <td class="brand text-small">{{$employees->spouse_name == "" ? "N/A" : $employees->spouse_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Blood Group</td>
                                            <td class="brand text-small"
                                                style="color: red;">{{$employees->blood_group}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Nationality</td>
                                            <td class="brand text-small">{{$employees->nationality}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Religion</td>
                                            <td class="brand text-small">{{$employees->religion}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">National ID</td>
                                            <td class="brand text-small"><img
                                                        src="{{URL::asset($employees->nid_url)}}" alt="" width="350"
                                                        height="200" class="img img-responsive img-thumbnail"></td>
                                        </tr>
                                        <tr>
                                            <td class="brand">National ID no.</td>
                                            <td class="brand text-small">{{$employees->nid_no}}</td>
                                        </tr>

                                        <tr>
                                            <td class="brand">Present Address</td>
                                            <td class="brand text-small">{{$employees->present_address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Permanent Address</td>
                                            <td class="brand text-small">{{$employees->permanent_address}}</td>
                                        </tr>


                                    </table>


                                    <div class="f1-buttons">
                                        <button type="button" class="btn btn-previous">Previous</button>
                                        <button type="button" class="btn btn-next">Next</button>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <h4>Here you contact information</h4>

                                    <table class="table table-responsive">
                                        <tr>
                                            <td class="brand">Mobile</td>
                                            <td class="brand text-small">{{$employees->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Alternative Mobile</td>
                                            <td class="brand text-small">{{$employees->alt_mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Guardian Mobile</td>
                                            <td class="brand text-small">{{$employees->guardian_mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Email</td>
                                            <td class="brand text-small">{{$employees->email}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">skype</td>
                                            <td class="brand text-small">{{$employees->skype}}</td>
                                        </tr>
                                        <tr>
                                            <td class="brand">Linkedin</td>
                                            <td class="brand text-small">{{$employees->linkedin}}</td>
                                        </tr>

                                    </table>

                                    <div class="f1-buttons">
                                        <button type="button" class="btn btn-previous">Previous</button>
                                    </div>
                                </fieldset>

                            </form>
                        </div>
                    </div>


                    {{-- Academic portion --}}
                    <div class="row" id="academicbody" style="display: none;">
                        <div class="col-md-11" id="timeline-body">
                            <div class="cd-container" id="cd-timeline">

                                @foreach($academics as $key => $academy)
                                    @if($key % 2 == 0)
                                        <div class="cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture"
                                                 style="text-align: center; color: white;">
                                                    <span class="fa fa-graduation-cap fa-2x"
                                                          style="margin-top: 15px;"></span>
                                            </div> <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h2>
                                                    @if($academy->degree == '1')
                                                        {{"PSC "}}
                                                    @elseif($academy->degree == '2')
                                                        {{"JSC "}}
                                                    @elseif($academy->degree == '3')
                                                        {{"SSC "}}
                                                    @elseif($academy->degree == '4')
                                                        {{"HSC "}}
                                                    @elseif($academy->degree == '5')
                                                        {{"Bachelors "}}
                                                    @elseif($academy->degree == '6')
                                                        {{"Masters "}}
                                                    @endif

                                                    in {{ucfirst($academy->subject)}}</h2>
                                                <p>From {{$academy->institute}}</p>
                                                <p>CGPA : {{$academy->CGPA}}</p>
                                                <p>Board : {{$academy->board}}</p>
                                                <span class="cd-date">Session : {{$academy->session}}</span>
                                            </div> <!-- cd-timeline-content -->
                                        </div> <!-- cd-timeline-block -->
                                    @else
                                        <div class="cd-timeline-block">
                                            <div class="cd-timeline-img cd-movie"
                                                 style="text-align: center; color: white;">
                                                    <span class="fa fa-graduation-cap fa-2x"
                                                          style="margin-top: 15px;"></span>
                                            </div> <!-- cd-timeline-img -->

                                            <div class="cd-timeline-content">
                                                <h2>
                                                    @if($academy->degree == '1')
                                                        {{"PSC "}}
                                                    @elseif($academy->degree == '2')
                                                        {{"JSC "}}
                                                    @elseif($academy->degree == '3')
                                                        {{"SSC "}}
                                                    @elseif($academy->degree == '4')
                                                        {{"HSC "}}
                                                    @elseif($academy->degree == '5')
                                                        {{"Bachelors "}}
                                                    @elseif($academy->degree == '6')
                                                        {{"Masters "}}
                                                    @endif

                                                    in {{ucfirst($academy->subject)}}</h2>
                                                <p>From {{$academy->institute}}</p>
                                                <p>CGPA : {{$academy->CGPA}}</p>
                                                <p>Board : {{$academy->board}}</p>
                                                <span class="cd-date">Session : {{$academy->session}}</span>
                                            </div> <!-- cd-timeline-content -->
                                        </div> <!-- cd-timeline-block -->

                                    @endif
                                @endforeach


                            </div>
                        </div>

                    </div>

                    {{-- Experience portion --}}
                    <div class="row" id="experiencebody" style="display: none;">
                        <div class="col-md-8 col-md-offset-1">
                            <h1 class="brand">Experience Information

                            </h1>
                            <table class="table table-responsive table-bordered">
                                <tr>
                                    <th>Works place</th>
                                    <th>Designation</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                </tr>
                                @foreach($exps as $exp)
                                    <tr>
                                        <th>{{$exp->worksplace}}</th>
                                        <th>{{$exp->designation}}</th>
                                        <th>{{$exp->address}}</th>
                                        <th>{{$exp->description}}</th>
                                        <th>{{$exp->duration}}</th>
                                    </tr>


                                @endforeach
                            </table>
                        </div>

                    </div>

                    {{-- skills portion --}}

                    <div class="row" id="skillbody" style="display: none;">
                        <div class="col-md-8 col-md-offset-1">
                            <h1 class="brand">My skills</h1>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        @foreach($skills as $skill)
                                            {{--<div class="col-md-4 col-sm-4" data-toggle="tooltip"
                                                 data-placement="top" title="{{$skill->skills}}">

                                                <div class="badge-wraper">
                                                    <span class="skill-badge">{{$skill->skills}}</span>
                                                    @if(Request::segment(2) == Auth::user()->id)
                                                        <a href="/delete-skill/{{$skill->id}}"
                                                           class="times-right"><span
                                                                    class="fa fa-times fa-2x"></span></a>
                                                    @elseif(Request::segment(2) == "")
                                                        <a href="/delete-skill/{{$skill->id}}"
                                                           class="times-right"><span
                                                                    class="fa fa-times fa-2x"></span></a>
                                                    @endif
                                                </div>


                                            </div>--}}
                                            @if($skill->proficiency == "100")
                                                <div class="progress skill-bar">
                                                    <div class="progress-bar progress-bar-primary active progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                        <span class="skill">{{$skill->skills}} <i class="val">Excellent</i></span>
                                                        <span class="sr-only">100% Complete (success)</span>
                                                    </div>
                                                </div>

                                            @elseif($skill->proficiency == "80")
                                                <div class="progress skill-bar">
                                                    <div class="progress-bar progress-bar-success active progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                        <span class="sr-only">80% Complete (success)</span>
                                                        <span class="skill">{{$skill->skills}} <i class="val">Good</i></span>
                                                    </div>
                                                </div>

                                            @elseif($skill->proficiency == "60")
                                                <div class="progress skill-bar">
                                                    <div class="progress-bar progress-bar-info active progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                        <span class="sr-only">60% Complete (success)</span>
                                                        <span class="skill">{{$skill->skills}} <i class="val">Average</i></span>
                                                    </div>
                                                </div>

                                            @elseif($skill->proficiency == "40")
                                                <div class="progress skill-bar">
                                                    <div class="progress-bar progress-bar-warning active progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                        <span class="skill">{{$skill->skills}} <i class="val">Satisfactory</i></span>
                                                    </div>
                                                </div>

                                            @elseif($skill->proficiency == "20")
                                                <div class="progress skill-bar">
                                                    <div class="progress-bar progress-bar-danger active progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                        <span class="sr-only">20% Complete (success)</span>
                                                        <span class="skill">{{$skill->skills}} <i class="val">Poor</i></span>
                                                    </div>
                                                </div>


                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- training section --}}
                    <div class="row" id="trainingbody" style="display: none;">
                        <div class="col-md-8 col-md-offset-1">
                            <h1 class="brand">Training Information


                            </h1>
                            <table class="table-responsive table table-bordered">
                                <tr>
                                    <th>Training Title</th>
                                    <th>Training Description</th>
                                    <th>Institute</th>
                                    <th>Course Type</th>
                                    <th>Year</th>
                                    <th>Duration</th>
                                    @if(Request::segment(2) == Auth::user()->id)
                                        <th>Action</th>
                                    @endif
                                </tr>
                                @foreach($trainings as $training)
                                    <tr class="training-table">
                                        <td>{{$training->title}}</td>
                                        <td>{{$training->description}}</td>
                                        <td>{{$training->institute}}</td>
                                        <td>{{$training->type}}</td>
                                        <td>{{$training->year}}</td>
                                        <td>{{$training->duration}}</td>
                                        @if(Request::segment(2) == Auth::user()->id)
                                            <td><a href="delete-training/{{$training->id}}"
                                                   class="times-right-training"><span
                                                            class="fa fa-times fa-2x"></span></a></td>
                                        @endif
                                    </tr>


                                @endforeach
                            </table>
                        </div>

                    </div>

                    {{-- reference section --}}

                    <div class="row" id="referencebody" style="display: none;">
                        <div class="col-md-12">
                            <h4 class="brand">References</h4>
                            <div class="row">
                                @foreach($references as $ref)
                                    <div class="col-md-6">
                                        <div class="ref">
                                            <table class="table table-responsive refTab">
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>{{$ref->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Designation:</th>
                                                    <td>{{$ref->designation}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile:</th>
                                                    <td>{{$ref->mobile}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td>{{$ref->email=="" ? "N/A" : $ref->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description:</th>
                                                    <td>{{$ref->description}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Relation:</th>
                                                    <td>{{$ref->relation}}</td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>


                                @endforeach
                            </div>


                        </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>




@endsection
@section('scripts')
    <script src="{{URL::asset('js/jquery.backstretch.js')}}"></script>
    <script src="{{URL::asset('js/jquery.retina-1.1.0.min.js')}}"></script>
    <script src="{{URL::asset('js/scripts.js')}}"></script>

    <script src="{{URL::asset('js/mysection.js')}}"></script>

    <script src="{{URL::asset('js/section-selector.js')}}"></script>

    <script src="{{url('js/timeline-main.js')}}"></script>
    <script>
        $(document).ready(function() {

            $('.progress .progress-bar').css("width",
                function() {
                    return $(this).attr("aria-valuenow") + "%";
                }
            )
        });

    </script>
@endsection