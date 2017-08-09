@extends('layouts.app')

@section('title','HRM::Employee list')
@section('styles')
	<link rel="stylesheet" href="{{asset('/css/sweetalert.css')}}">

@endsection


@section('content')

    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-12 table-responsive">
				@if(count($employees) <= 0)
					<div class="text-center text-danger" style="margin-top: 100px;">
						<i class="fa fa-exclamation-triangle fa-2x"></i>
						<br>
						<h2>No employee found!</h2>
					</div>

				@else
                <h1>Employee list</h1>
                <table class="table table-responsive table-bordered" id="my-table">
                	<thead>
						<tr>
							@if(Auth::user()->role == 1)
								<th>ID</th>

							@else
								<th>Sl.</th>
							@endif
							<th>Name</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Job Title</th>
							<th>Job Type</th>
							@if(Auth::user()->role == 1)
								<th>Action</th>
								{{--<th>Delete</th>--}}
							@endif


						</tr>
					</thead>
					<tbody>
					@foreach($employees as $key => $emp)


					

						<tr >
							@if(Auth::user()->role == 1)
								<td>{{$emp->user_id}}</td>
							@else
								<td>{{($key+1)}}</td>
							@endif
							<td>{{$emp->name}}</td>
							<td>{{$emp->mobile == null ? "N/A" : $emp->mobile}}</td>
							<td>{{$emp->email == null ? "N/A" : $emp->email}}</td>
							<td>{{$emp->job_title == null ? "N/A" : $emp->job_title}}</td>
							<td>{{$emp->job_type == null ? "N/A" : $emp->job_type}}</td>
							@if(Auth::user()->role == 1)

								<td>
									<a  href="user-profile/{{$emp->user_id}}"><span class="fa fa-info-circle fa-2x tr-box "></span></a>
									<a  href="javascript:void(0)" class="dlt" data-uid="{{$emp->user_id}}"><span class="fa fa-times-circle fa-2x tr-dlt "></span></a>
								</td>
								{{--<td style="text-align: center;"></td>--}}
							@endif
						</tr>



					@endforeach

					</tbody>

                </table>
					{!! $employees->render() !!}
					@endif
            </div>
        </div>
    </div>

@endsection
@section('scripts')
	<script src="{{asset('js/sweetalert-dev.js')}}"></script>
	<script>
		$(document).ready(function(){

            $('.dlt').click(function(e){
                e.preventDefault();
				var uid = $(this).data('uid');
				//alert(uid);
                swal({
                        title: "Are you sure?",
                        text: "Do you really want to delete this employee?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",

                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {


                            $.ajax({
								type : "GET",
								url : "{{url('user-delete')}}/"+uid,
								dataType: 'JSON',
								success: function(data){
								    console.log(data);
                                    swal("Deleted!", "The Employee Has been deleted", "success");
                                    location.reload();
								}
							});

                        } else {
                            swal("Cancelled", "The employee information are safe", "error");
                        }
                    });
			});



		});
	</script>

@endsection
