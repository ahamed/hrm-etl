@extends('layouts.app')


@section('title','HRM::ezzetech | mail')


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
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
					@foreach($mails as $key => $mail )
						<tr  data-toggle="modal" data-target="#myModal{{$mail->id}}" class="clickable">
							<td>{{($key+1)}}</td>
							<td>{{$mail->subject}}</td>
							<td>{{$mail->content > 100 ? mb_substr($mail->content, 0, 97).'...' : $mail->content}}</td>
							<td>{{date('d F, Y',strtotime($mail->created_at))}}</td>
						</tr>


						{{-- put modal code here --}}
					@endforeach
					</tbody>

				</table>
			</div>
		</div>

		@foreach($mails as $key => $mail)
		<div class="modal fade" id="myModal{{$mail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">mail</h4>
		      </div>
		      <div class="modal-body" style="padding: 60px;">
		        	<div class="row">
		        		<h4 class="brand">{{date('d F, Y',strtotime($mail->created_at))}}</h4>
		        		<h5>{{count($receivers) > 0 ? $receivers[$key]->name:''}}</h5>
		        		<h5 class="">HR. Ezzetech Ltd.</h5>
		        		<h5 class="">Dhaka, Bangladesh</h5>
		        	</div>
		        	<div class="row">
		        		<p class="brand"><strong>Subject: </strong>{{$mail->subject}}</p>
		        		<p style="text-align: justify;">{!! nl2br(e($mail->content)) !!}</p>
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