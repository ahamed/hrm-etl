@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
        <div class="row" style="margin-top: 80px;">
            <div class="col-sm-8 col-md-8 col-xs-12 col-sm-offset-2 col-md-offset-2">
                {{--<h2>Provident Fund</h2>--}}
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th colspan="2">PROVIDENT FUND</th>
                        </tr>
                    </thead>
                    <tr>
                        <th>Company contribution</th>
                        <td>{{ $fund->company }}</td>
                    </tr>
                    <tr>
                        <th>My contribution</th>
                        <td>{{ $fund->woner }}</td>
                    </tr>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th>{{ $fund->company+$fund->woner }}</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{url('js/printThis.js')}}"></script>
    <script src="{{url('js/auto-sizing.js')}}"></script>
    <script>
        $(function(){


        });
    </script>

@endsection
