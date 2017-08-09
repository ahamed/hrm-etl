@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
        <div class="row" id="load-container" style="display: none;">
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>
        </div>
        <div class="row" id="content">
            <h2 class="brand">Upload Resources</h2>
            <hr>
            <div class="col-md-6 col-md-offset-3">
                <form action="up-res" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Resource Title</label>
                        <input type="text" name="res_title" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="res_file">Resource File</label>
                        <input type="file" name="res_file" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Upload" class="btn btn-success" id="up">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

           $('#up').click(function(){
               $('#load-container').show();
               $('#content').hide();
           }) ;
        
    </script>


@endsection
