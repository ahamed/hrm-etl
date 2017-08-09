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
				<h1 class="brand">Sent box</h1>
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
						<tr  data-toggle="modal" data-target="#myModal{{$application->id}}" class="clickable">
							<td>{{($key+1)}}</td>
							<td>{{$application->type}}</td>
							<td>{{mb_strimwidth($application->content, 0, 97, '...')}}</td>
							@if($application->status == "pending")
								<td class="alert alert-warning">{{$application->status}} <span class="fa fa-hourglass-start fa-2x pull-right"></span></td>
							@elseif($application->status == "rejected")
								<td class="alert alert-danger">{{$application->status}} <span class="fa fa-times fa-2x pull-right"></span></td>
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
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Application</h4>
		      </div>
		      <div class="modal-body" style="padding: 60px;">
		        	<div class="row">
		        		<h4 class="brand">{{date('d F, Y',strtotime($app->created_at))}}</h4>
		        		<h5 class="">{{$receivers[$key]->name}}</h5>
		        		<h5 class="">HR. Ezzetech Ltd.</h5>
		        		<h5 class="">Dhaka, Bangladesh</h5>
		        	</div>
		        	<div class="row">
		        		<p class="brand"><strong>Subject: </strong>{{$app->subject}}</p>
		        		<p style="text-align: justify;">{!! nl2br(e($app->content)) !!}</p>
		        	</div>
		        	<div class="row">
		        		<h4 class="brand">sincerely,</h4>
		        		<h5>{{$senders[$key]->name}}</h5>

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






<!-- scripting section -->
@section('scripts')
	<script>
		$(document).ready(function(){
			$('#my-table').DataTable();
		});
	</script>

@endsection