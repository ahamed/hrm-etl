@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
       
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="brand">Set Entry Time</h2>
                <hr>
                <form action="{{url('set-entry-time')}}" method="post">
                	{{csrf_field()}}
                	<table class="table table-responsive">
	                	<tr>
	                		<th>Sl</th>
	                		<th>Employee</th>
	                		<th>Entry Time</th>
	                	</tr>
	                	@foreach($employees as $key => $emp)
						
						<tr style="border: none;">
							<td style="border: none;">{{($key+1)}}</td>
							<td style="border: none;">{{$emp->name}}</td>
							<td style="border: none;"><input type="time" name="entry_time[]" value="{{$emp->entry_time}}"></td>
						</tr>

						
	                	@endforeach

	                	<tr style="border: none;">
	                		<td style="border: none;">
	                			{!! $employees->render() !!}
	                		</td>
	                		<td style="border: none;"></td>
	                		<td style="border: none;">
	                			<input type="submit" class="btn btn-primary" value="Save" style="width: 100px;">
	                		</td>
	                	</tr>
	                </table>
						
                </form>
                
            </div>
        </div>
    </div>

@endsection
