@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="table-responsive">
                    @if(count($reports) <= 0)
                        <div class="text-center text-danger" style="margin-top: 100px;">
                            <i class="fa fa-exclamation-triangle fa-2x"></i>
                            <br>
                            <h2>No data found!</h2>
                        </div>

                    @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="4">Monthly reports of employees
                                    <br>
                                    {{$months[request()->month-1]}}, {{ request()->year }}
                                </th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Employee name</th>
                                <th>Employee designation</th>
                                <th>Report content</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $key => $report)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $report->employeeInfo['name'] }}</td>
                                    <td>{{ $report->employeeInfo['job_title'] }}</td>
                                    <td>{!! nl2br(e($report->content)) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {!! $reports->render() !!}
                    @endif
                </div>
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
