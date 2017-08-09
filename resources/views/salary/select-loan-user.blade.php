@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       	<div class="row">
       		<div class="center">
       			<h3>Provide Loan</h3>
       			<h4>{{date('d F, Y',strtotime(\Carbon\Carbon::now()))}}</h4>
       		</div>
       	</div>
       	<hr>
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        	<form action="{{url('loan-setting')}}" method="POST">
	        	{{csrf_field()}}
	        	<div class="form-group">
	        		<label for="">Select Employee</label>
	    			<select name="user_id" id="" class="form-control" required>
	    				<option value="">Select an employee</option>
	    				@foreach($employees as $user)
	    				<option value="{{$user->id}}">{{$user->name}}</option>
	    				@endforeach
	    			</select>
				</div>
				
    		<div class="form-group">
    			<input type="submit" class="btn btn-primary" value="Go">
    		</div>
        </form>	
      </div>
      
          
      </div>
  </div>

@endsection
