@extends('layouts.app')


@section('title','HRM::ezzetech | Notice')


<!-- styles section -->
@section('styles')


@endsection


<!-- content section -->

@section('content')
	<div class="container">
		<h1 class="brand">Compose Notice</h1>
       	<hr>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form action="{{url('add-notice')}}" method="post">
					{{csrf_field()}}
					
					<div class="form-group">
						<label for="subject">Topic</label>
						<input type="text" class="form-control" name="topic">
					</div>

					<div class="form-group">
						<label for="content">Notice Content</label>
						<textarea name="contant" class="form-control" id="" cols="30" rows="10"></textarea>
					</div>

					<div class="form-group">
						
						<input type="submit" class="btn btn-primary pull-right" value="Add">
					</div>


				</form>
			</div>
		</div>
	</div>

@endsection




<!-- scripting section -->
@section('scripts')


@endsection