@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
    	<div class="col-md-6 col-md-offset-3">
    		<form action="{{url('bodlao')}}" method="post">
            {{csrf_field()}}
                <h1 class="brand">Change your password</h1>
                <hr>
                @if(Session::pull('generic_error','0') == '1')
                <div class="form-group">
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                   
                    Your Current password not matched. Please provide your current password and then your new password</div>
                </div>
                @endif
    			<div class="form-group">
    				<label for="">Current Password</label>
    				<input type="password" name="cpassword" class="form-control"  required>
    			</div>
    			<div class="form-group">
    				<label for="">New Password</label>
    				<input type="password" name="npassword" class="form-control" id="np" required>
    			</div>
    			<div class="form-group">
    				<label for=""><span class="fa fa-check" style="color:green; display: none;" id="check" ></span> Confirm Password</label>

    				<input type="password" name="cnpassword" class="form-control" id="cnp" required>

    			</div>
    			<div class="form-group">
    				
    				<input type="submit"  class="btn btn-primary" value="Change" id="ok">
    			</div>
    		</form>
    	</div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        $('#ok').prop('disabled',true);
        $('#check').hide();
        $("#cnp").on('keyup',function(){
            var np =  $("#np").val();
            var cnp = $(this).val();
            if(np == cnp){
                $('#ok').prop('disabled',false);
                $('#check').show('slow');
            }else{
                $('#ok').prop('disabled',true);
                $('#check').hide('slow');
            }
        })
    });
</script>


@endsection
