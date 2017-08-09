@extends('layouts.app')

@section('title','HRM::POS-Data')
@section('styles')
	<style>
		#loader-wrapper{
			background: black;
			
		}
	</style>
@endsection


@section('content')

    <div class="col-md-12">
       	<div class="row" id="load-container" style="display: none;">
       		<div id="loader-wrapper">
			<div id="loader"></div>
		</div>
       	</div>
        <div class="row" id="content">
        	<div>
        		<h2 class="brand">Upload your attendance file</h2>
        		<hr>
        	</div>
            <div class="col-md-12 col-xs-12 col-sm-12">
            	<form action="{{url('dat-data')}}" method="POST" enctype="multipart/form-data">
            		{{csrf_field()}}
            		<div class="wrap">
            			<div class="box">
							<input type="file" name="attendance" id="file-5" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple required />
							<label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose the attendance file&hellip;</span></label>
							<br>
							<input type="submit" class="btn btn-success" value="Upload"  id="load">
						</div>	
            		</div>
            		
            	</form>
                
            </div>
        </div>
    </div>

@endsection
@section('scripts')

<script>
	
		
		$("#load").click(function(){
			$("#load-container").show('slow');
			$('#content').hide();
		});
	
</script>

@endsection
