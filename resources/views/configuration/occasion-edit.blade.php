@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       
        <div class="row">
            <div class="col-md-12">
                <h1>Occasions</h1>
                <hr>
                <form action="{{url('/date-config-edit')}}" method="post">
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
                	</div>
                	@foreach($allData as $oc)
                	<div class="row">
                		<div class="col-md-4" style="text-align: right;">
                			
                			<h4 class="brand">{{$oc->events}}</h4>
                			<input type="hidden" value="{{$oc->events}}" name="events[]">
                		</div>	
                		<div class="col-md-3">
                			
                			<div class="form-group">
				                <div class='input-group date' id='datetimepicker1'>
				                    <input type='date' class="form-control" name="start[]" value="{{$oc->start}}" >
				                    <span class="input-group-addon">
				                        <span class="fa fa-calendar"></span>
				                    </span>
				                </div>
		            		</div>
                		</div>
                		<div class="col-md-3">

                			<div class="form-group">
				                <div class='input-group date' id='datetimepicker1'>
				                    <input type='date' class="form-control" name="end[]" value="{{$oc->end}}">
				                    <span class="input-group-addon">
				                        <span class="fa fa-calendar"></span>
				                    </span>
				                </div>
				            </div>
                		</div>
                	</div>
                	
                	@endforeach
                	<div class="col-md-3 col-md-offset-4">
                		<div class="form-group">
	                		<input type="submit" value="Save" class="btn btn-primary btn-block">
	                	</div>	
                	</div>
                	
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(function () {

                $('#datetimepicker1').datetimepicker();
            });
	</script>

@endsection
