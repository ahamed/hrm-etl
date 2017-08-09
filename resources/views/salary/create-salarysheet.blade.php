@extends('layouts.app')

@section('title','HRM::Create salary sheet')
@section('styles')
    <style>
        input {display: block !important; padding: 0 !important; margin: 0 !important; border: 0 !important; width: 100% !important; border-radius: 0 !important; line-height: 1 !important;}
        td {margin: 0 !important; padding: 0 !important; width: 100% !important;
            padding:15px !important;
        }
        table > tbody  td, table > thead th {
            /*border: 1px solid black !important;*/

        }
        input{
            width: 80px !important;
        }

        .bordering{
            border: 1px solid #18A689 !important;
            z-index: 9999;
            -webkit-box-shadow: 1px 1px 1px 1px gray;
            -moz-box-shadow: 1px 1px 1px 1px gray;
            box-shadow: 1px 1px 1px 1px gray;
        }


    </style>
@endsection


@section('content')

    <div class="col-md-12">
        <form action="{{url('save-salary-sheet')}}" method="post">
            {{csrf_field()}}
            <div class="table-responsive">
                <table class="table table-bordered table-condensed">
                    <thead style="background: black;">
                    <tr style="background: #000;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Basic</th>
                        <th>Bonus</th>
                        <th>Lunch</th>
                        <th>Home allowance</th>
                        <th>Health allowance</th>
                        <th>Provident fund (5% of basic)</th>
                        <th>Transportation allowance</th>
                        <th>Mobile allowance</th>
                        <th>Sales profit</th>
                        <th>Profit share</th>
                        <th>Other earnings</th>
                        <th>Title</th>
                        <th>Loan</th>
                        <th>Provident fund (10% of basic)</th>
                        <th>Leave allowed</th>
                        <th>Absence</th>
                        <th>Late attendance</th>
                        <th>Other deductions</th>
                        <th>Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $emp)
                        <tr>
                            <td>{{$emp->user_id}}</td>
                            <td>{{$emp->name}}</td>
                            <input type="hidden" name="user_id[]" value="{{$emp->user_id}}">
                            <input type="hidden" name="month" value="{{request()->month}}">
                            <input type="hidden" name="year" value="{{request()->year}}">
                            <td>
                                <input type="number" name="basic[]" value="{{$emp->basic}}" class="form-control" >
                            </td>
                            <td>
                                <input type="number" name="bonus[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="lunch[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="home_allowance[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="health_allowance[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="provident_allowance[]" value="{{ $emp->pf == 1 ? ($emp->basic * 0.05) : 0 }}" class="form-control" readonly>
                            </td>
                            <td>
                                <input type="number" name="transportation_allowance[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="mobile_allowance[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="sales_profit[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="profit_share[]" value="0" class="form-control">
                            </td>

                            <td>
                                <input type="number" name="other_earnings[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="oe_text[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="loan[]" value="{{$emp->loan_payable}}" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="" value="{{ $emp->pf == 1 ? ($emp->basic * 0.10) : 0}}" class="form-control" readonly>
                            </td>
                            <td>
                                <input type="number" name="leave_allowed[]" value="{{$emp->leave_allowed}}" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="leave_taken[]" value="{{$emp->absent}}" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="late_count[]" value="{{$emp->late}}" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="other_deductions[]" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="od_text[]" value="0" class="form-control">
                            </td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>
            <br>
            <button type="submit" class="btn btn-primary pull-right">Create</button>
        </form>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('input').focus(function(){
                $(this).parent().addClass('bordering');
            });
            $('input').focusout(function(){
                $(this).parent().removeClass('bordering');
            });
        });
    </script>

@endsection

