@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       
        <div class="row">
            <div class="col-md-12">
                <h3>Vacations</h3>
                <hr>
                <form action="{{url('/save-date')}}" method="post">
                	{{csrf_field()}}

                	<div class="row">
                		<div class="col-md-4">
                			<h4 class="center">Events</h4>
                			<hr>
                		</div>
                		<div class="col-md-3">
                			<h4 class="center">Start Date</h4>
                			<hr>
                		</div>
                		<div class="col-md-3">
                			<h4 class="center">End Date</h4>
                			<hr>
                		</div>
                		<div class="col-md-2">
                			<h4 class="center">Days</h4>
                			<hr>
                		</div>
                	</div>
                	<div id="event-container">
                	@foreach($allOccasions as $oc)
                	
                	
                		<div class="row" id="event-wrapper">
                			<input type="hidden" name="ids[]" value="{{$oc->id == null ? '' : $oc->id}}">
	                		<div class="col-md-4" style="text-align: right;" id="title">
	                			
	                			<h4 class="brand evnt">{{$oc->events}}</h4>
	                			<input type="hidden" value="{{$oc->events}}" name="events[]" id="myEvent">
	                		</div>	
	                		<div class="col-md-3">
	                			
	                			<div class="form-group">
					                <div class='input-group date' id='datetimepicker1'>
					                    <input type='date' class="form-control" name="start[]" value="{{$oc->start}}" {{$oc->fixed == 1 ? 'readonly' : ''}}>
					                    <span class="input-group-addon">
					                        <span class="fa fa-calendar"></span>
					                    </span>
					                </div>
			            		</div>
	                		</div>
	                		<div class="col-md-3">

	                			<div class="form-group">
					                <div class='input-group date' id='datetimepicker1'>
					                    <input type='date' class="form-control" name="end[]" value="{{$oc->end}}" {{$oc->fixed == 1 ? 'readonly' : ''}}>
					                    <span class="input-group-addon">
					                        <span class="fa fa-calendar"></span>
					                    </span>
					                </div>
					            </div>
	                		</div>
	                		<div class="col-md-2" >
	                			<h4 class="center">{{$oc->days}} {{$oc->days > 1 ? "Days" : "Day"}}</h4>
	                		</div>
	                	</div>
                	
                	@endforeach
                	</div>

                	<div class="col-md-3 col-md-offset-4">
                		<div class="form-group">
	                		<input type="submit" value="Save" class="btn btn-primary btn-block">
	                	</div>	
                	</div>
                	<div class="col-md-3 ">
                		<div class="form-group">
	                		<button type="button" id="event" class="btn btn-info btn-block"><span class="fa fa-plus"></span> Create a new event</button>
	                	</div>	
                	</div>
                	
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#event').click(function(){
		        var cloned = $('#event-wrapper').clone();
		        cloned.find('.evnt').remove();
		        cloned.find('#myEvent').remove();
		        cloned.find('#title').append('<input type="text" name="events[]" class="form-control" placeholder="Enter an event name">');
		        cloned.find('.form-control').removeAttr('readonly');
		        cloned.appendTo('#event-container');
		    });
		});
	</script>

@endsection
