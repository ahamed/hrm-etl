@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       
        <div class="row">
            <div class="col-md-6">
            	
            	<canvas id="empnum" width="515" height="515" >
            		
            	</canvas>
            	<h4 class="brand center">Employee numbers of various departments</h4>

            </div>
            <div class="col-md-6">
            	<canvas id="empnum1" width="515" height="515"></canvas>
            	<h4 class="brand center">Attendance last month (%)</h4>
            </div>
        </div>
		<div class="row" style="margin-top: 50px;">
			<div class="col-md-6">
				<div class="list-group">
					<li href="#" class="list-group-item active primary" style="font-size: 20px;">
						Documents <a href="{{url('/resource-list')}}" class="pull-right" style="font-size: 15px; color: #4b0f31;"><small>(View all)</small></a>
					</li>
					@foreach($documents as $doc)
						<a href="{{url('/download')}}/{{$doc->id}}" class="list-group-item" style="font-size: 14px;">{{$doc->resource_title}}</a>
					@endforeach
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
					<li href="#" class="list-group-item active primary" style="font-size: 20px;">
						Notices <a href="{{url('/notice-board')}}" class="pull-right" style="font-size: 15px; color: #4b0f31;"><small>(View all)</small></a>
					</li>
					@foreach($notices as $notice)
						<a data-toggle="modal" data-target="#myModal{{$notice->id}}" class="list-group-item" style="font-size: 14px;">{{$notice->topic}}</a>
					@endforeach

				</div>
			</div>

		</div>

		@foreach($notices as $notice)
			<div class="modal fade" id="myModal{{$notice->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Notice</h4>
						</div>
						<div class="modal-body" style="padding: 60px;">
							<div class="row">
								<h4>OFFICIAL NOTICE</h4>
								<h4 class="brand">{{date('d F, Y',strtotime($notice->created_at))}}</h4>

							</div>
							<div class="row">

								<p style="text-align: justify;">{!! nl2br(e($notice->content)) !!}</p>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

						</div>
					</div>
				</div>
			</div>
		@endforeach


    </div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script>
	
		$(document).ready(function(){

            localStorage.setItem("div_selector","pi");

			Chart.defaults.global.responsive = true;

			var data = {
			    labels: [
			    @foreach($emp as $e)
			    "{{$e->department}}"{{","}}

			    @endforeach
			        
			    ],
			    datasets: [
			        {

			            data: [
			            @foreach($emp as $e)
			            	{{$e->total}}{{","}}
			            @endforeach
			            
			            
			            ],
			            backgroundColor: [

			          		
			                'rgb(255, 99, 132)',
			                'rgb(54, 162, 235)',
			                'rgb(255, 206, 86)',
			                'rgb(75, 192, 192)',
			                'rgb(153, 102, 255)',
			                'rgb(255, 159, 64)'
			            ],
			            hoverBackgroundColor: [
			                'rgb(255, 99, 140)',
			                'rgb(54, 162, 240)',
			                'rgb(255, 206, 90)',
			                'rgb(75, 192, 200)',
			                'rgb(153, 102, 255)',
			                'rgb(255, 159, 70)'
			            ]
			        }]
			};


			var comparison = {
			    labels: [
			    	@if(sizeof($attends) > 0)
				    @foreach($attends as $attend)
				    "{{$attend->name}}"{{","}}
				    @endforeach
					@else
					"employee1","employee2","employee3","employee4","employee5","employee6","employee7"
					@endif


			    ],
			    datasets: [

			    	{
			    	    @if(sizeof($attends) <= 0)
                        label: "Sample Data",
						@else
			            label: "{{ date('F', mktime(0, 0, 0, $attends[0]->month, 10))}}",
						@endif
			            backgroundColor: "rgba(255,0,0,0.2)",
			            borderColor: "rgba(255,0,0,1)",
			            pointBackgroundColor: "rgba(255,0,0,1)",
			            pointBorderColor: "#fff",
			            pointHoverBackgroundColor: "#fff",
			            pointHoverBorderColor: "rgba(255,0,0,1)",
			            data: [
			                @if(sizeof($attends) > 0)
			           		@foreach($attends as $key => $attend)

			            	{{((($DayOfMonth[($attend->month-1)] - $attend->absent) * 100 ) / ($DayOfMonth[($attend->month-1)] - $attend->leave_allowed)) > 100 ? 100 : (($DayOfMonth[($attend->month-1)] - $attend->absent) * 100 ) / ($DayOfMonth[($attend->month-1)] - $attend->leave_allowed) }}{{","}}

			            	@endforeach
							@else
                                28, 48, 40, 19, 96, 27, 100
							@endif
			            
			            ]
			        }
			       
			    	
			        
			    ]
			};
			

			//console.log(comparison);
			var ctx = document.getElementById("empnum").getContext("2d");
			var ctx1 = document.getElementById("empnum1").getContext("2d");
				var myPieChart = new Chart(ctx,{
				    type: 'pie',
				    data: data,
				    options: {

				    }
				});

				var myPieChart1 = new Chart(ctx1,{
				    type: 'radar',
				    data: comparison,
				    options: {
				    	
				    }
				});
			
		});
	/*var ctx = document.getElementById("empnum").getContext("2d");
	var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});*/
</script>

@endsection
