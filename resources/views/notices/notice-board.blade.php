@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       	<h1 class="brand">Notice Board</h1>
       	<hr>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table responsive table-bordered">
                	<tr>
                		<th>Sl</th>
                		<th>Date</th>
                		<th>Topic</th>
                		<th>Content</th>
                	</tr>
                	@foreach($notices as $key => $notice)
					<tr data-toggle="modal" data-target="#myModal{{$notice->id}}" class="clickable">
						<td>{{($key+1)}}</td>
						<td>{{date('d F, Y',strtotime($notice->created_at))}}</td>
						<td>{{$notice->topic}}</td>
						{{--<td>{{mb_strimwidth($notice->content, 0, 97, '...')}}</td>--}}
						<td>{{strlen($notice->content) > 100 ? mb_substr($notice->content,0,97).'...':$notice->content}}</td>
					</tr>

                	@endforeach
                </table>
            </div>



            <!-- modal section -->
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
    </div>

@endsection
