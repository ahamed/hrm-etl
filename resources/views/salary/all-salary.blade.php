@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

	<div class="col-md-12">

		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
						<div class="center">
							<h3 class="brand">Salary sheet - {{ date("F", mktime(0, 0, 0, $salaryData[0]->month, 1)) }}, {{$salaryData[0]->year}}</h3>
							<h4>Currency - <span style="font-weight: bolder;">&#2547;</span> (BDT)</h4>
						</div>
					</div>
				</div>

				<hr>
				<div class="table-responsive">
					<table class="table table responsive table-bordered">
						<thead>
						{{--<tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Basic</th>
                            <th>Bonus</th>
                            <th>Loan</th>
                            <th>Loan adjustment</th>
                            <th>Loan remains</th>
                            <th>Leave Allowed</th>
                            <th>Leave Taken</th>
                            <th>Late entry</th>
                            <th>Salary</th>
                        </tr>--}}
						<tr>
							<th colspan="3" >Information</th>
							<th colspan="12" >Earnings</th>
							<th colspan="5" >Deduction</th>
							<th colspan="1" >Salary</th>
							<th colspan="1" >Print</th>

						</tr>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th >Designation</th>
							<th>Basic</th>
							<th>Bonus</th>
							<th>Lunch</th>
							<th>Home allowance</th>
							<th>Health allowance</th>
							<th>Provident fund (5% of basic)</th>
							<th>Transportation allowance</th>
							<th>Mobile allowance</th>
							<th>Sales profit</th>
							<th>Profit share</th>
							<th>Others</th>
							<th >Gross Earning</th>
							<th>Loan</th>
							<th>Provident fund (10% of basic)</th>
							<th>Absence</th>
							<th>Late</th>
							<th >Others</th>
							<th>Net total</th>
							<th></th>

						</tr>
						</thead>
						<tbody>
						@foreach($salaryData as $key => $data)
							<tr>
								<td>{{($key+1)}}</td>
								<td>{{$data->employeeInfo['name']}}</td>
								<td>{{$data->employeeInfo['job_title']}}</td>
								<td>{{$data->basic}}</td>
								<td>{{$data->bonus}}</td>
								<td>{{$data->lunch}}</td>
								<td>{{$data->home_allowance}}</td>
								<td>{{$data->health_allowance}}</td>
								<td>{{$data->provident_fund}}</td>
								<td>{{$data->transportation_allowance}}</td>
								<td>{{$data->mobile_allowance}}</td>
								<td>{{$data->sales_profit}}</td>
								<td>{{$data->profit_share}}</td>
								<td>{{$data->other_earnings}}</td>
								<td>{{$data->gross}}</td>
								<td>{{$data->loan}}</td>
								<td>{{$data->provident_fund * 2}}</td>
								<td>{{$data->leave_taken}}</td>
								<td>{{$data->late_count}}</td>
								<td>{{$data->other_deductions}}</td>
								<td>{{$data->gross - $data->deductions}}</td>
								<td>
									<a href="{{url('my-salary-data')}}?month={{request()->month}}&year={{request()->year}}&user={{$data->user_id}}" class="btn btn-link"><i class="fa fa-print text-success fa-2x"></i></a>
								</td>

							</tr>
						@endforeach
						</tbody>

					</table>
				</div>


				{!! $salaryData->render() !!}

			</div>
		</div>
	</div>

@endsection
