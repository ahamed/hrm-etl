@extends('layouts.app')

@section('title','HRM::Register')
@section('styles')

@endsection

@section('content')
    <div class="col-md-12">
        <h4 class="brand center">Create an employee</h4>
        <hr>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('create-employee')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">User id</label>

                            <div class="col-md-5">

                                <input id="uid" type="text" class="form-control" name="id" value="{{ old('id') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="col-sm-1 col-md-1">
                                <span id="spinner" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></span>
                                <span class="fa fa-check fa-2x" id="ok" style="display: none; color: green;"></span>
                                <span class="fa fa-times fa-2x" id="cross" style="display: none; color: darkred;"></span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Job Title</label>

                            <div class="col-md-5">
                                <input id="job_title" type="text" class="form-control" name="job_title" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('job_title'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('job_title') }}</strong>
                                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="f1-first-name">Join Date</label>
                            <div class="col-md-5">
                                <input type="date" name="join_date" placeholder="Join date" class="f1-first-name form-control" id="f1-first-name" required>
                            </div>

                        </div>



                        <div class="form-group">
                            <label class="col-md-4 control-label" for="f1-about-yourself">Job Type</label>
                            <div class="col-md-5">
                                <select name="job_type" id="" class="form-control" required>
                                    <option value="">Select job type</option>
                                    <option value="Full Time" >Full Time</option>
                                    <option value="Part Time" >Part Time</option>
                                    <option value="Innovation Team" >Innovation Team</option>
                                </select>
                            </div>

                        </div>
            <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="f1-last-name">Department</label>
                            <div class="col-md-5">
                                <select name="department" id="" class="form-control" required>
                                    <option value="">Select a department</option>
                                    <option value="Development" >Development</option>
                                    <option value="HR" >HR</option>
                                    <option value="Sales and Operation" >Sales and Operation</option>
                                    <option value="Marketing and Promotion" >Marketing and Promotion</option>
                                    <option value="Design and Creativity" >Design and Creativity</option>
                                    <option value="Business Development" >Business Development</option>
                                    <option value="Dhaka Live">Dhaka Live</option>

                                </select>
                            </div>

                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="basic" class="col-md-4 control-label">Salary Basic</label>

                            <div class="col-md-5">
                                <input id="basic" type="number" class="form-control" name="basic" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="entry_time" class="col-md-4 control-label">Entry Time</label>

                            <div class="col-md-5">
                                <input id="entry_time" type="time" class="form-control" name="entry_time" value="10:00:00" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-4">
                                <button type="submit" id="create" class="btn btn-primary btn-center" style="width: 200px;" disabled>
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#uid').on('keyup',function(e){
                e.preventDefault();

                $('#cross').hide();
                $('#spinner').show();
                $('#ok').hide();
                $('#create').prop('disabled',true);

                var uid = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: "{{url('check-user')}}/"+uid,
                    dataType : 'json',
                    success: function(data){
                        console.log(data);
                        if(Object.keys(data).length <= 0 && uid.length > 0){
                            $('#cross').hide();
                            $('#spinner').hide();
                            $('#ok').show();
                            $('#create').prop('disabled',false);
                        }else{
                            $('#cross').show();
                            $('#spinner').hide();
                            $('#ok').hide();
                            $('#create').prop('disabled',true);
                        }
                    }
                });
            });

            $('#uid').blur(function(e){
                e.preventDefault();

                $('#cross').hide();
                $('#spinner').show();
                $('#ok').hide();
                $('#create').prop('disabled',true);

                var uid = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: "{{url('check-user')}}/"+uid,
                    dataType : 'json',
                    success: function(data){
                        console.log(data);
                        if(Object.keys(data).length <= 0 && uid.length > 0){
                            $('#cross').hide();
                            $('#spinner').hide();
                            $('#ok').show();
                            $('#create').prop('disabled',false);
                        }else{
                            $('#cross').show();
                            $('#spinner').hide();
                            $('#ok').hide();
                            $('#create').prop('disabled',true);
                        }
                    }
                });
            });

        });
    </script>
@endsection