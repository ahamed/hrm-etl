@extends('layouts.app')


@section('title','HRM::ezzetech | Application')


<!-- styles section -->
@section('styles')


@endsection


<!-- content section -->

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form action="{{url('send-mail')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label for="to">To</label>
						<select name="receiver_id" id="" class="form-control">
							<option value="">Select a recipent</option>
							@foreach($tos as $to)
							@if($to->id != Auth::user()->id)
							<option value="{{$to->id}}">{{$to->name}}</option>
							@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="subject">Subject</label>
						<input type="text" class="form-control" name="subject">
					</div>

					<div class="form-group">
						<label for="content">Application Content</label>
						<textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
					</div>

					<div class="form-group">
						
						<input type="submit" class="btn btn-primary pull-right" value="Send">
					</div>


				</form>
			</div>
		</div>
	</div>

@endsection




<!-- scripting section -->
@section('scripts')


@endsection