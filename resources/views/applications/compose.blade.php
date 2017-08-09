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
				<form action="{{url('send-application')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label for="to">To</label>
						<select name="receiver_id" id="" class="form-control"  required>
							<option value="">Select a recipent</option>
							@foreach($tos as $to)
							<option value="{{$to->id}}">{{$to->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="type">Application Type</label>
						<select name="subject" id="type" class="form-control" required>
							<option value="">Select an application type</option>
							<option value="Leave in advance">Leave in advance</option>
							<option value="Leave of absence">Leave of absence</option>
							<option value="Complaint">Complaint</option>
							<option value="Late attendance">Late attendance</option>
						</select>
					</div>
					<div class="form-group" style="display: none;" id="advance">
						<label for="days">How many days you want to take leave</label>
						<input type="number" value="0" class="form-control" name="addays" required>
					</div>
					<div class="form-group" style="display: none;" id="absence">
						<label for="days">How many days you have already taken leaves</label>
						<input type="number" value="0" class="form-control" name="abdays" required>
					</div>
					

					<div class="form-group">
						<label for="content">Application Content</label>
						<textarea name="app_content" class="form-control" id="" cols="30" rows="10" required></textarea>
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#type').on('change',function(){
			var appType = $(this).val();
			
			if(appType == "Leave in advance"){
				$('#advance').show('slow');
				$('#absence').hide();
			}else if(appType == "Leave of absence"){
				$('#absence').show('slow');
				$('#advance').hide();
			}else{
				$('#absence').hide();
				$('#advance').hide();
			}
		});
	});
</script>
@endsection