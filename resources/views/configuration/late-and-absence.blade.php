@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="brand">Set late and absence</h2>
                <hr>
                @if(Session::get('save-la')!='')
                <div class="alert alert-success text-center alert-la">
                    <h4 class=""><strong>{{Session::pull('save-la','')}}</strong></h4>
                </div>
                @endif
                <form action="{{url('set-late-absence')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="month" value="{{request()->month}}">
                    <input type="hidden" name="year" value="{{request()->year}}">
                    <div class="table-responsive">
                        <table class="table table-responsive">
                            <tr>
                                <th>Sl</th>
                                <th>Employee</th>
                                <th>Absent (days)</th>
                                <th>Late (days)</th>
                            </tr>
                            @foreach($users as $key => $user)

                                <tr style="border: none;">
                                    <td style="border: none;">{{($key+1)}}</td>
                                    <td style="border: none;">{{$user->name}}</td>
                                    <input type="hidden" value="{{$user->user_id}}" name="user_id[]">
                                    <td style="border: none;"><input type="number" name="absent[]" value="0" class="form-control"></td>
                                    <td style="border: none;"><input type="number" name="late_count[]" value="0" class="form-control"></td>
                                </tr>


                            @endforeach

                            <tr style="border: none;">
                                <td style="border: none;">

                                </td>
                                <td style="border: none;"></td>
                                <td style="border: none;">
                                    <input type="submit" class="btn btn-primary" value="Save" style="width: 100px;">
                                </td>
                            </tr>
                        </table>
                    </div>


                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                $('.alert-la').hide('slow');
            },2000);
        });
    </script>

@endsection
