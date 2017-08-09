@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                <h2 class="brand">Performance Appraiser</h2>
                <form action="{{url('/performance')}}" method="post" class="form">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <select name="emp" id="employee" class="form-control select2" required>
                                    <option value="">Select Employee</option>
                                    @foreach($employees as $emp)
                                        <option value="{{$emp->user_id}}">{{$emp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 month" style="display: none;">
                            <div class="form-group">
                                <select name="month" id="month" class="form-control select2" required  >
                                    <option value="">Select Month</option>
                                    @foreach($months as $key => $month)
                                        <option value="{{$key+1}}">{{$month}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 year" style="display: none;" >
                            <div class="form-group">
                                <select name="year" id="year" class="form-control select2" required>
                                    <option value="">Select Year</option>
                                    @for($year = \Carbon\Carbon::now()->year; $year >= \Carbon\Carbon::now()->year - 50; $year--)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Appraiser</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <th>Works to Full Potential</th>
                                <td>
                                    <select name="wfp" id="s1" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <th>Quality of Work / Productivity / Work Consistency</th>
                                <td>
                                    <select name="qw" id="s2" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <th>Communication / Group Work/ Co-worker Relations</th>
                                <td>
                                    <select name="communication" id="s3" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <th>Creativity / Dependability</th>
                                <td>
                                    <select name="creativity" id="s4" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <th>Honesty / Integrity/  Punctuality
                                    Trustworthy</th>
                                <td>
                                    <select name="honesty" id="s5" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <th>Attitude / organizational culture</th>
                                <td>
                                    <select name="attitute" id="s6" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <th>Client Relations</th>
                                <td>
                                    <select name="cr" id="s7" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <th>Technical Skills</th>
                                <td>
                                    <select name="ts" id="s8" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <th>Attendance</th>
                                <td>
                                    <select name="la" id="s9" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <th>Leave and Holidays</th>
                                <td>
                                    <select name="leave" id="s10" class="form-control" required>
                                        <option value="">Select an appraiser</option>
                                        <option value="0">Unsatisfactory</option>
                                        <option value="4">Average</option>
                                        <option value="8">Satisfactory</option>
                                        <option value="9">Good</option>
                                        <option value="10">Excellent</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <textarea name="comment" class="form-control" id="comment" cols="30" rows="2" placeholder="Comment about him/her" required></textarea>
                                </td>

                                <td id="mark">Total : 0</td>
                            </tr>



                        </table>
                    </div>
                    <div class="row">

                            <div class="btn-group pull-right" role="group">

                                <button class="btn btn-primary" type="submit">Save</button>

                                
                            </div>


                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.select2').select2({
                theme: "bootstrap",
                allowClear: true,
                tags: true,
                maximumSelectionLength: 5,
                width: '100%'
            });

            var mark = 0;
            var m1 = 0, m2 = 0, m3 = 0, m4 = 0, m5 = 0, m6 = 0, m7 = 0, m8 = 0, m9 = 0, m10 = 0;
            sessionStorage.m1 = 0;
            sessionStorage.m2 = 0;
            sessionStorage.m3 = 0;
            sessionStorage.m4 = 0;
            sessionStorage.m5 = 0;
            sessionStorage.m6= 0;
            sessionStorage.m7 = 0;
            sessionStorage.m8 = 0;
            sessionStorage.m9 = 0;
            sessionStorage.m10 = 0;
            sessionStorage.mark = 0;


            $('#employee').on('change',function(){
               $('.month').show('slow');
            });

            $('#month').on('change',function(){
                $('.year').show('slow');
            });

            $('#s1').on('change',function(){
               sessionStorage.m1 = parseInt($(this).val());
               sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                   parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                   parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                   parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s2').on('change',function(){
                sessionStorage.m2 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s3').on('change',function(){
                sessionStorage.m3 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s4').on('change',function(){
                sessionStorage.m4 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s5').on('change',function(){
                sessionStorage.m5 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s6').on('change',function(){
                sessionStorage.m6 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s7').on('change',function(){
                sessionStorage.m7 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s8').on('change',function(){
                sessionStorage.m8 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s9').on('change',function(){
                sessionStorage.m9 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });
            $('#s10').on('change',function(){
                sessionStorage.m10 = parseInt($(this).val());
                sessionStorage.mark = parseInt(sessionStorage.m1) + parseInt(sessionStorage.m2) +
                    parseInt(sessionStorage.m3) + parseInt(sessionStorage.m4) + parseInt(sessionStorage.m5) +
                    parseInt(sessionStorage.m6) + parseInt(sessionStorage.m7) + parseInt(sessionStorage.m8) +
                    parseInt(sessionStorage.m9) + parseInt(sessionStorage.m10);
                console.log(sessionStorage.mark);
                $('#mark').text("Total: "+sessionStorage.mark);
            });



            //Do ajax stuff here
            $('#year').on('change',function(){
                var id1 = $('#employee').val();
                var id2 = $('#month').val();
                var id3 = $(this).val();
                $.ajax({
                    type : 'GET',
                    url : "{{url('get-performance')}}/"+id1+"/"+id2+"/"+id3,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        if(Object.keys(data).length > 0){
                            $('#s1').val(data.wfp);
                            $('#s2').val(data.qw);
                            $('#s3').val(data.communication);
                            $('#s4').val(data.creativity);
                            $('#s5').val(data.honesty);
                            $('#s6').val(data.attitute);
                            $('#s7').val(data.cr);
                            $('#s8').val(data.ts);
                            $('#s9').val(data.la);
                            $('#s10').val(data.leave);
                            $('#comment').val(data.comment);
                            var total = parseInt(data.wfp) + parseInt(data.qw) + parseInt(data.communication)+
                            parseInt(data.creativity) + parseInt(data.honesty) + parseInt(data.attitute)+
                            parseInt(data.cr) + parseInt(data.ts) + parseInt(data.la)+parseInt(data.leave);
                            $('#mark').text("total: "+total );
                            sessionStorage.m1 = data.wfp;
                            sessionStorage.m2 = data.qw;
                            sessionStorage.m3 = data.communication;
                            sessionStorage.m4 = data.creativity;
                            sessionStorage.m5 = data.honesty;
                            sessionStorage.m6= data.attitute;
                            sessionStorage.m7 = data.cr;
                            sessionStorage.m8 = data.ts;
                            sessionStorage.m9 = data.la;
                            sessionStorage.m10 = data.leave;
                            sessionStorage.mark = total;


                        }
                    }


                });
            });



        });
    </script>


@endsection
