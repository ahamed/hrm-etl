@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="center">
                <h3>My salary Sheet</h3>
                {{--<h4>{{date('d F, Y',strtotime(\Carbon\Carbon::now()))}}</h4>--}}
            </div>
        </div>
        <div class="alert-wraper" >
            @if(Session::get('msg') !='')
                <div class="alert alert-danger my-alert-edit text-center" style="display: none; position: absolute; left: 30%; top:0; width: 400px;">
                    <h3><strong><i class="fa fa-exclamation-triangle"></i> </strong> {{Session::pull('msg','')}}</h3>
                </div>
            @endif
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{url('my-salary-data')}}" method="GET">


                    <div class="form-group">
                        <label for="">Select Month</label>
                        <select name="month" id="" class="form-control" required>
                            <option value="">Select a month</option>
                            @foreach($months as $key => $month)
                                <option value="{{($key+1)}}">{{$month}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Year</label>
                        <select name="year" id="" class="form-control">
                            <option value="">-- Select a year --</option>
                            @for($year = \Carbon\Carbon::now()->year ; $year >= \Carbon\Carbon::now()->year - 20; $year--)
                                <option value="{{$year}}">{{$year}}</option>

                            @endfor
                        </select>
                        {{--<input type="text" name="year" placeholder="Year" class="form-control">--}}
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Go">
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
