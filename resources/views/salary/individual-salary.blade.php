@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       
        <div class="row">
            <div class="col-md-12">
            	<div class="center">
            		<h1 class="brand">Salary sheet</h1>
            	</div>
            	<hr>
            	<div class="form-group">
            		<input type="text" placeholder="Search salary by year" id="search" class="form-control">
            	</div>
            	<table class="table table responsive table-bordered">
            		<tr>
            			<th>Sl</th>
            			<th>Month</th>
            			<th>Year</th>
            			<th>Basic</th>
            			<th>Bonus</th>
            			<th>Adjustment</th>
            			<th>Prv. Loan</th>
            			<th>New Loan</th>
            			<th>Adj. Loan</th>
            			<th>Last Loan</th>
            			<th>Working Day</th>
            			<th>Leave Allowed</th>
            			<th>Leave Taken</th>
            			<th>Salary</th>
            		</tr>
            		@foreach($salary as $key => $data)
					<tr>
						<td>{{($key+1)}}</td>
						<td>{{$data->month}}</td>
						<td>{{$data->year}}</td>
						<td>{{$data->basic}}</td>
						<td>{{$data->bonus}}</td>
						<td>{{$data->adjustment}}</td>
						<td>{{$data->prev_loan}}</td>
						<td>{{$data->new_loan}}</td>
						<td>{{$data->adjust_loan}}</td>
						<td>{{$data->last_loan}}</td>
						<td>{{$data->working_day}}</td>
						<td>{{$data->allowed_leave}}</td>
						<td>{{$data->taken_leave}}</td>
						<td>{{(($data->basic+$data->bonus) - ($data->adjustment + $data->adjust_loan))}}</td>
						
					</tr>

            		@endforeach
            	</table>
               
            </div>
        </div>
    </div>



@endsection
@section('scripts')
<script>
$(document).ready(function(){

	$('#search').on('keyup',function(){
		var value = $(this).val();
		$('table tr').each(function(index){
			if(index > 0){
				var row = $(this);
				var id = row.find("td:nth-child(3)").text();
				if(id.indexOf(value) != 0){
					$(this).hide();
				}else{
					$(this).show();
				}
			}
		});
	});


});
	
</script>
@endsection