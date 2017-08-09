@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       
        <div class="row">
        <form action="{{url('salary')}}/{{$current_id}}" method="post">
        	{{csrf_field()}}

        	<div class="row">
        		<div class="center">
        			<h3>Salary Sheet</h3>
					<h4>{{date('d F, Y',strtotime(\Carbon\Carbon::now()))}}</h4>	
        		</div>
				

        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<div class="col-md-4">
        		<h4 class="brand">Basic</h4>
        		<hr>
				
        		<div class="form-group">
        		<label for="basic">Basic</label>
        			<input type="number"  id="basic" name="basic" class="form-control" placeholder="Basic salary" value="{{$salary->basic}}">
    			</div>
	            	<div class="form-group">
	            		<label for="bonus">Bonus</label>
	            		<input type="number"  id="bonus" name="bonus" class="form-control" placeholder="Bonus Salary" value="0">
	            	</div>
	            	<div class="form-group">
	            		<label for="adjustment">Adjustment</label>
	            		<input type="number"  id="adjustment" name="adjustment" class="form-control" placeholder="Adjust Salary" value="0">
	            	</div>
	            </div>

	            <div class="col-md-4">
	        		<h4 class="brand">Loan</h4>
	        		<hr>
	        		
	        		<div class="form-group">
	            		<label for="prev_loan">Previous Loan</label>
	            		<input type="number"  id="prev_loan" name="prev_loan" class="form-control" value="{{$salary->last_loan}}" readonly>
	            	</div>
	            	<div class="form-group">
	            		<label for="new_loan">New Loan</label>
	            		<input type="number"  id="new_loan" name="new_loan" class="form-control" placeholder="New Loan" value="0">
	            	</div>
	            	
	            	<div class="form-group">
	            		<label for="adjust_loan">Adjust Loan</label>
	            		<input type="number"  id="adjust_loan" name="adjust_loan" class="form-control" placeholder="Adjust Loan" value="0">
	            	</div>
	            	<div class="form-group">
	            		<label for="last_loan">Last Loan</label>
	            		<input type="number"  id="last_loan" name="last_loan" class="form-control"  readonly>
	            	</div>
	            </div>

	            <div class="col-md-4">
	        		<h4 class="brand">Attendance</h4>
	        		<hr>
	            	<div class="form-group">
	            		<label for="working_day">Working day</label>
	            		<input type="number"  id="working_day" name="working_day" class="form-control" value="30" readonly>
	            	</div>
	            	<div class="form-group">
	            		<label for="bonus">Leave Allowed</label>
	            		<input type="number"  id="leaved_allowed" name="allowed_leave" class="form-control" placeholder="Number of day allowed to leave">
	            	</div>
	            	<div class="form-group">
        				<input type="submit"  id="leaved_allowed" class="btn btn-primary" value="	Submit">
        			</div>
	            	
	            </div>

	            
    		</div>

    	</div>
        	
        </form>
            
        </div>
    </div>

@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		var ploan = 0;
		var nloan = 0;
		var aloan = 0;

		 ploan = parseInt($('#prev_loan').val());
		 nloan = parseInt($('#new_loan').val());

		 $("#last_loan").val(ploan+nloan);

		 $("#new_loan").on('input',function(){
		 	
		 	if(nloan == NaN){
		 		nloan = 0;
		 	}else{
		 		nloan = parseInt($(this).val());	
		 	}
		 	
		 	$('#last_loan').val(nloan+ploan);
		 	console.log(nloan+ploan);

		 });

		 $("#adjust_loan").on('input',function(){
		 	if($(this).val() == NaN){
		 		aloan = 0;
		 	}else{
		 		aloan = parseInt($(this).val());
		 	}

		 	$("#last_loan").val((ploan + nloan) - aloan);

		 });
		 



	});
</script>

@endsection

