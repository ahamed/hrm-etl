@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')
    <style>
        .paid{
            position: absolute;
            top: 20px;
            left:15%;
            z-index: 999;
            opacity: 0.1;
        }
    </style>
@endsection


@section('content')

    <div class="col-md-12">
        <div id="print-content">

            <div class="row">

                <div class="col-sm-12 col-md-12 col-xs-12">

                    <div class="text-center">
                        <h3>Ezze Technology ltd.</h3>
                        <h4>
                            Salary sheet - {{date("F", mktime(0, 0, 0, request()->month, 1))}}, {{request()->year}}
                            <small>Currency  ৳ (BDT)</small>
                        </h4>

                    </div>
                </div>

            </div>

           {{-- <div class="row" id="paid">
                <div class="col-sm-12 col-md-12 col-xs-2">
                    <div class="paid text-center">
                        <img src="{{url('images/Paid.png')}}" alt="" width="300" height="300">
                    </div>
                </div>
            </div>--}}

            <div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="panel panel-success" id="p11">
                        <div class="panel-heading">
                            <h3 class="panel-title">Earnings</h3>
                        </div>
                        <div class="panel-body ">
                            <table class="table">
                                <tr>
                                    <th><strong>Basic (A)</strong></th>
                                    <td>{{$salaryData->first()->basic}}</td>
                                </tr>
                                <tr>
                                    <th>Bonus (B)</th>
                                    <td>{{$salaryData->first()->bonus}}</td>
                                </tr>

                                <tr>
                                    <th>Lunch (C)</th>
                                    <td>{{$salaryData->first()->lunch}}</td>
                                </tr>
                                <tr>
                                    <th>Home Allowance (D)</th>
                                    <td>{{$salaryData->first()->home_allowance}}</td>
                                </tr>
                                <tr class="text-success">
                                    <th><strong class="text-primary">*</strong> <span class="text-success">Provident fund(5% of basic) (E)</span></th>
                                    <td class="text-success">{{$salaryData->first()->provident_fund}}</td>
                                </tr>
                                <tr class="text-danger">
                                    <th><strong class="text-danger">*</strong> <span class="text-danger">Transportation Allowance (E)</span></th>
                                    <td class="text-danger">{{$salaryData->first()->transportation_allowance}}</td>
                                </tr>
                                <tr class="text-danger">
                                    <th><strong class="text-danger">*</strong> <span class="text-danger">Mobile Allowance (F)</span></th>
                                    <td class="text-danger">{{$salaryData->first()->mobile_allowance}}</td>
                                </tr>
                                <tr>
                                    <th>Health Allowance (G)</th>
                                    <td>{{$salaryData->first()->health_allowance}}</td>
                                </tr>
                                <tr>
                                    <th>Sales profit (H)</th>
                                    <td>{{$salaryData->first()->sales_profit}}</td>
                                </tr>
                                <tr>
                                    <th>Profit share (I)</th>
                                    <td>{{$salaryData->first()->profit_share}}</td>
                                </tr>

                                <tr>
                                    <th>Other earnings {{$salaryData->first()->oe_text == '' ? '' : '('.$salaryData->first()->oe_text.')'}} (J)</th>
                                    <td>{{$salaryData->first()->other_earnings}}</td>
                                </tr>
                                <tr style="border-top: 2px solid black;">
                                    <th>Gross earnings (A+B+C+D+E+F+G+H+I+J)</th>
                                    <td>{{$salaryData->first()->gross}}</td>
                                </tr>
                                <tr>
                                    <th>Payable earnings (A+B+C+D+E+G+H+I+J) (K)</th>
                                    <td>{{$salaryData->first()->gross - $salaryData->first()->mobile_allowance - $salaryData->first()->transportation_allowance}}</td>
                                </tr>
                                <tr class="text-danger">
                                    <th>
                                        <strong class="text-danger">*</strong> <sapn class="text-danger">Paid before.</sapn>
                                    </th>

                                </tr>
                                <tr class="text-success">
                                    <th>
                                        <strong class="text-success">*</strong> <sapn class="text-success">Employee contribution (5%) and Company contribution (5%) will be deducted from gross salary and make a provident fund.</sapn>
                                    </th>

                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="panel panel-success" id="p21">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Information</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th><strong>Name</strong></th>
                                            <td>{{$salaryData->first()->employeeInfo['name']}}</td>
                                        </tr>
                                        <tr>
                                            <th>Designation</th>
                                            <td>{{$salaryData->first()->employeeInfo['job_title']}}</td>
                                        </tr>


                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-success" id="p12">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Deductions</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th><strong>Loan (A)</strong></th>
                                            <td>{{$salaryData->first()->loan}}</td>
                                        </tr>

                                        <tr>
                                            <th>Absence (B)</th>
                                            <td>{{$salaryData->first()->leave_taken}}</td>
                                        </tr>
                                        <tr>
                                            <th>Late Attendance (C)</th>
                                            <td>{{$salaryData->first()->late_count}}</td>
                                        </tr>
                                        <tr class="text-success">
                                            <th><strong class="text-success">*</strong> <span class="text-success">Provident Fund(10% of basic) (D)</span></th>
                                            <td class="text-success">{{$salaryData->first()->provident_fund * 2}}</td>
                                        </tr>
                                        <tr>
                                            <th>Other deductions {{$salaryData->first()->od_text == '' ? '' : '('.$salaryData->first()->od_text.')'}} (E)</th>
                                            <td>{{$salaryData->first()->other_deductions}}</td>
                                        </tr>

                                        <tr style="border-top: 2px solid black;">
                                            <th>Total deduction(A+B+C+D+E) (L)</th>
                                            <td>{{$salaryData->first()->deductions}}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12">
                            <div class="panel panel-success" id="p22">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Salary</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th><strong>Net Total (K-L)</strong></th>
                                            <td>{{$salaryData->first()->gross - $salaryData->first()->mobile_allowance - $salaryData->first()->transportation_allowance - $salaryData->first()->deductions}}</td>
                                        </tr>
                                        @if($salaryData->first()->paid == 1)
                                            <tr>
                                                <th>Salary status</th>
                                                <td class="text-danger">Paid</td>
                                            </tr>

                                        @else
                                            <tr>
                                                <th>Salary status</th>
                                                <td class="text-danger">Unpaid</td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-md-4 col-xs-6 col-sm-offset-8 col-md-offset-8">
                <button class="btn btn-primary pull-right" id="print"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
        {{--<div class="row">
            <div class="col-sm-6 col-md-6 col-xs-12">

            </div>
            <div class="col-sm-6 col-md-6 col-xs-12">

            </div>
        </div>--}}

    </div>

@endsection
@section('scripts')
    <script src="{{url('js/printThis.js')}}"></script>
    <script src="{{url('js/auto-sizing.js')}}"></script>
    <script src="{{url('js/jQuery.print.js')}}"></script>
    <script>
        $(function(){
            'use strict';

            setTimeout(function(){
                $('.my-alert-edit').addClass('animated slideInDown');
                $('.my-alert-edit').show();

            },50);

            setTimeout(function(){
                $('.my-alert-edit').addClass('animated slideOutUp');
            },5000);

            //Do print stuffs


            $('#print').click(function(e){
               e.preventDefault();
               $("#print-content").print({
                   globalStyles: true,
                   mediaPrint: false,
                   stylesheet: "{{url('css/print-bootstrap.css')}}",
                   noPrintSelector: ".no-print",
                   iframe: true,
                   append: null,
                   prepend: null,
                   manuallyCopyFormValues: true,
                   deferred: $.Deferred(),
                   timeout: 2000,
                   title: null,
                   doctype: '<!doctype html>',
                   customScript:"{{ url('js/customScript.js') }}",
               });

                /*$("#print-content").printThis({
                    debug: false,               // show the iframe for debugging
                    importCSS: true,            // import page CSS
                    importStyle: true,         // import style tags
                    printContainer: true,       // grab outer container as well as the contents of the selector
                    loadCSS: "{{url('css/print-bootstrap.css')}}",  // path to additional css file - use an array [] for multiple
                    pageTitle: "",              // add title to print page
                    removeInline: false,        // remove all inline styles from print elements
                    printDelay: 2000,            // variable print delay; depending on complexity a higher value may be necessary
                    header: null,               // prefix to html
                    footer: null,               // postfix to html
                    base: false ,               // preserve the BASE tag, or accept a string for the URL
                    formValues: true,           // preserve input/form values
                    canvas: false,              // copy canvas elements (experimental)
                    doctypeString: "<!doctype html>",       // enter a different doctype for older markup
                    removeScripts: false,       // remove script tags from print content
                    copyTagClasses: false
                });*/


            });

        });
    </script>

@endsection
