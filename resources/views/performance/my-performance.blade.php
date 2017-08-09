@extends('layouts.app')

@section('title','HRM::Performance')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/ripples.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-wfont.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flipper.css')}}">
@endsection


@section('content')

    <div class="col-sm-12 col-md-12">
        <h1>Performance Appraiser</h1>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('js/ripples.min.js')}}"></script>
    <script src="{{asset('js/material.min.js')}}"></script>
    <script src="{{asset('js/flipper.js')}}"></script>

@endsection

