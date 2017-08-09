@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <div class="alert alert-warning text-center">
                    <i class="fa fa-exclamation-triangle fa-3x"></i><br>
                    <strong> {{$message}}</strong>
                </div>
                <div class="box box-primary">
                    <div style="margin-top: 100px;">
                        <h4 class="brand">Do you want to fulfill the requirements?</h4>
                        <a href="{{url('get-late-absence')}}?month={{$month}}&year={{$year}}" class="btn btn-primary">Yes</a>
                        <a href="{{url('/')}}" class="btn btn-danger">No! thanks.</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
