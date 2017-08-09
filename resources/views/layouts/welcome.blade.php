@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       
        <div class="row">
            <div class="col-md-6">
            	
            	<canvas id="empnum" >
            		
            	</canvas>
            	<h4 class="brand center">Employee numbers of various departments</h4>

            </div>
            <div class="col-md-6">
            	<canvas id="empnum1"></canvas>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
<script>
	//var ctx = document.getElementById("empnum");

	/**/

		function getRandomColor() {
		    var letters = '0123456789ABCDEF';
		    var color = '#';
		    for (var i = 0; i < 6; i++ ) {
		        color += letters[Math.floor(Math.random() * 16)];
		    }
		    document.write(color);
		}


		function isLeapYear(year){
			 return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
		}

		$(document).ready(function(){


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
			    	//There the name of all employees
				    //"Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"
				    @foreach($attends1 as $attend)
				    "{{$attend->name}}"{{","}}
				    @endforeach
			    ],
			    datasets: [
			    	@if(sizeof($attends2) > 0)
			    	{
			            label: "{{ date("F", mktime(0, 0, 0, $attends1[0]->month, 1)) }}",
			            backgroundColor: "rgba(255,0,0,0.2)",
			            borderColor: "rgba(255,0,0,1)",
			            pointBackgroundColor: "rgba(255,0,0,1)",
			            pointBorderColor: "#fff",
			            pointHoverBackgroundColor: "#fff",
			            pointHoverBorderColor: "rgba(255,0,0,1)",
			            data: [
			            @foreach($attends1 as $key => $attend)
			            	
			            	{{(($DayOfMonth[($attend->month-1)] - $attend->absent) * 100 ) / ($DayOfMonth[($attend->month-1)] - $attend->leave_allowed)}}{{","}}	
			            	
			            @endforeach
			            ]
			        },
			        {
			            label: "{{ date("F", mktime(0, 0, 0, $attends2[0]->month, 1)) }}",
			            backgroundColor: "rgba(0,255,0,0.2)",
			            borderColor: "rgba(0,255,0,1)",
			            pointBackgroundColor: "rgba(0,255,0,1)",
			            pointBorderColor: "#fff",
			            pointHoverBackgroundColor: "#fff",
			            pointHoverBorderColor: "rgba(0,255,0,1)",
			            data: [
			             @foreach($attends2 as $key => $attend2)
			            	
			            	{{(($DayOfMonth[($attend2->month-1)] - $attend2->absent) * 100 ) / ($DayOfMonth[($attend2->month-1)] - $attend2->leave_allowed)}}{{","}}
			            	
			            @endforeach
			            ]
			        }



			    	@elseif(sizeof($attends1) >0)
			    	{
			            label: "{{ date("F", mktime(0, 0, 0, $attends1[0]->month, 1)) }}",
			            backgroundColor: "rgba(255,0,0,0.2)",
			            borderColor: "rgba(255,0,0,1)",
			            pointBackgroundColor: "rgba(255,0,0,0.2)",
			            pointBorderColor: "#fff",
			            pointHoverBackgroundColor: "#fff",
			            pointHoverBorderColor: "rgba(255,0,0,1)",
			            data: [
			            @foreach($attends1 as $key => $attend)
			            	
			            	{{((intval($DayOfMonth[($attend->month-1)]) - intval($attend->absent)) * 100 ) / (intval($DayOfMonth[($attend->month-1)]) - intval($attend->leave_allowed))}}{{","}}
			            	
			            @endforeach
			            ]
			        }

			        @else
			        {
			            label: "No Month",
			            backgroundColor: "rgba(179,181,198,0.2)",
			            borderColor: "rgba(179,181,198,1)",
			            pointBackgroundColor: "rgba(179,181,198,1)",
			            pointBorderColor: "#fff",
			            pointHoverBackgroundColor: "#fff",
			            pointHoverBorderColor: "rgba(179,181,198,1)",
			            data: [28, 48, 40, 19, 96, 27, 100]

			        }

			    	@endif
			        
			    ]
			};
			

			console.log(comparison);
			var ctx = document.getElementById("empnum").getContext("2d");
			var ctx1 = document.getElementById("empnum1").getContext("2d");
				var myPieChart = new Chart(ctx,{
				    type: 'pie',
				    data: data,
				    options: {
				        animation:{
				            animateScale:true
				        }
				    }
				});

				var myPieChart1 = new Chart(ctx1,{
				    type: 'radar',
				    data: comparison,
				    options: {
				        scaleLineColor: 'yellow',
				        angleLineColor: 'red'
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
