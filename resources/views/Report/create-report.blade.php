@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-xs-12 ">
                <div class="row">
                    <div class="col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-4">
                        <h2 class="">Submit your monthly report</h2>
                    </div>
                </div>
                <hr>

                <form action="{{url('create-this')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="" class="col-sm-4 col-md-4 control-label">Month</label>
                        <div class="col-sm-8 col-md-8">
                            <input type="text" class="form-control" value="{{ $months[request()->month-1] }}" readonly>
                            <input type="hidden" value="{{ request()->month }}" name="month">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 col-md-4 control-label">Year</label>
                        <div class="col-sm-8 col-md-8">
                            <input name="year" type="text" class="form-control" value="{{ request()->year }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 col-md-4 control-label">Content</label>
                        <div class="col-sm-8 col-md-8">
                            <textarea name="contents" id="content" cols="10" rows="5" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function(){
            setTimeout(function(){
                $('.my-alert-edit').addClass('animated slideInDown');
                $('.my-alert-edit').show();

            },50);

            setTimeout(function(){
                $('.my-alert-edit').addClass('animated slideOutUp');
            },5000);
        });
    </script>

@endsection
