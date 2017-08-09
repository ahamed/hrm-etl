@extends('layouts.app')


@section('title','HRM::ezzetech | Application')


<!-- styles section -->
@section('styles')


@endsection


<!-- content section -->

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-11">
				<h1 class="brand">Application Inbox</h1>
				<hr>
				<table class="table table-responsive table-bordered" id="my-table">
					<thead>
						<tr>
							<th>Sl</th>
							<th>Subject</th>
							<th>Content</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					@foreach($applications as $key => $application )

						<tr  data-toggle="modal" data-target="#myModal{{$application->id}}" class="clickable" data-backdrop="static" data-keyboard="false">
							<td>{{($key+1)}}</td>
							<td>{{$application->type}}</td>
							<td>{{mb_strimwidth($application->content, 0, 97, '...')}}</td>
							@if($application->status == "pending")
								<td class="alert alert-warning">{{$application->status}} <span class="fa fa-hourglass-start fa-2x pull-right"></span></td>
							@elseif($application->status == "rejected")
								<td class="alert alert-danger">{{$application->status}} <span class="fa fa-times fa-2x pull-right"></span></td>
							@elseif($application->status == "viewed")
								<td class="alert alert-info">{{$application->status}} <span class="fa fa-eye fa-2x pull-right"></span></td>
							@else
								<td class="alert alert-success">{{$application->status}} <span class="fa fa-check fa-2x pull-right"></span></td>
							@endif



						</tr>


						{{-- put modal code here --}}
					@endforeach
					</tbody>

				</table>
			</div>
		</div>

		@foreach($applications as $key => $app)
		<div class="modal fade" id="myModal{{$app->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		      	@if($app->type == "Late attendance" || $app->type == "Leave in advance" || $app->type == "Leave of absence" || $app->status == "viewed")
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        @endif
		        <h4 class="modal-title" id="myModalLabel">Application</h4>
		      </div>
		      <div class="modal-body" style="padding: 60px;">
		        	
		        	<div class="row">
		        	@if(($app->type == "Leave in advance" || $app->type == "Leave of absence" || $app->type == "Late attendance")&&($app->status == "pending"))
		        		<div class="pull-right">
		        			<div class="btn-group" role="group">
		        				<a href="{{url('/set-accepted')}}/{{$app->id}}" class="btn btn-primary"><span class="fa fa-check"></span></a>
		        				<a href="{{url('/set-rejected')}}/{{$app->id}}" class="btn btn-danger"><span class="fa fa-times"></span></a>
		        			</div>
		        		</div>

					@endif
		        		<h4 class="brand">{{date('d F, Y',strtotime($app->created_at))}}</h4>
		        		<h5 class="">{{$receivers[$key]->name}}</h5>
		        		<h5 class="">HR. Ezzetech Ltd.</h5>
		        		<h5 class="">Dhaka, Bangladesh</h5>
		        	</div>
		        	
		        	<div class="row">
		        		<p class="brand"><strong>Subject: </strong>{{$app->type}}</p>
		        		<p style="text-align: justify;">{!! nl2br(e($app->content)) !!}</p>
		        	</div>
		        	<div class="row">
		        		<h4 class="brand">sincerely,</h4>
		        		<h5>{{$senders[$key]->name}}</h5>
		        		<br>
		        		@if($app->type == "Leave in advance")
		        		<h3>Seeked Leave: {{$app->days}} {{$app->days < 2 ? "Day" : "Days"}}</h3>
		        		@elseif($app->type == "Leave of absence")
						<h3>Leave taken: {{$app->days}} {{$app->days < 2 ? "Day" : "Days"}}</h3>
		        		@endif

		        	</div>
		      </div>
		      <div class="modal-footer">
		      	@if($app->type == "Late attendance" || $app->type === "Leave in advance" || $app->type === "Leave of absence" || $app->status == "viewed")
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      	@else
				<a href="{{url('read-app')}}/{{$app->id}}" class="btn btn-danger" >Close</a>
		      	@endif
		        
		        
		      </div>
		    </div>
		  </div>
		</div>


@endforeach


	</div>
	


	

@endsection






<!-- scripting section -->
@section('scripts')

	<script>
		$(document).ready(function(){
			$('#my-table').DataTable();
		});
	</script>
@endsection