<!DOCTYPE html>
<html lang="en">
<head>
    
   


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="manifest" href="{{URL::asset('/manifest.json')}}">
    <link href="{{URL::asset('/css/app.css')}}" rel="stylesheet">

    <link href="{{URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{URL::asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <!-- Animation Css  -->
    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/custom.css')}}">
    <link rel="icon" href="/images/send.png">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/normalize.css')}}">
    <link rel="stylesheet" href="{{url('css/main.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('css/demo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/component.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.dynatable.css')}}" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{url('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('css/select2.bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">


    <style>
        /*input, textarea{
            color: black !important;
        }
        input[type='search']{
            border: 1px solid lawngreen;
            !*background: rgba(124, 252, 0, 0.3);*!
        }
        input[type='search']:focus{
            border: 1px solid forestgreen;
            background: rgba(124, 252, 0, 0.2);
        }
        select[name="my-table_length"]{
            border: 1px solid lawngreen;
            !*background: rgba(124, 252, 0, 0.3);*!
        }
        select[name="my-table_length"]:focus{
            border: 1px solid lawngreen;
            background: rgba(124, 252, 0, 0.2);
        }
        li.paginate_button.active {
            background: rgba(124, 252, 0, 0.5);
        }
        li.paginate_button.active > a{
            background: rgba(124, 252, 0, 0.9);
            color: darkgreen;
        }

        .paginate_button:hover{
            background: rgba(124, 252, 0, 0.6) !important;
            border: none;
        }
        .paginate_button:hover a{
            background: rgba(124, 252, 0, 1);
            color: darkgreen;
        }
        .paginate_button a:hover{
            background: rgba(124, 252, 0, 1) !important;
            color: darkgreen;
        }
        .paginate_button a:focus{
            background: rgba(124, 252, 0, 1) !important;
            color: darkgreen;
        }*/
        thead{
            background: #006A72;
            color: white;
            font-weight: bold;
        }
        th.sorting_asc{
            background: rgb(0, 106, 88) !important;
            color: white;
            font-weight:bold !important;
        }
        html, body{
            overflow-y: auto;
        }
        thead{
            /*color: #18A689;*/
        }
        thead > tr > th{
            text-align: center;
        }
        thead > tr > th{
            background: #18A689 !important;
        }
        tfoot > tr > th{
            background: #18A689 !important;
            color: #fff !important;
        }
    </style>

    
    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel=<?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{url('js/modernizr-2.6.2.min.js')}}"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(["init", {
            appId: "50ffab6a-6c6e-46be-9ce1-ce65edf45a87",
            safari_web_id: 'web.onesignal.auto.0919e572-6b9a-4fc1-8566-50f787b3e729',
            persistNotification: false,
            autoRegister: true,
            notifyButton: {
                enable: true /* Set to false to hide */
            },
            welcomeNotification: {
                "title": "Welcome",
                "message": "Welcome to Ezzetechnology. For any interection with Ezzetechnology keep touch in https://hrm.etl.com.bd",
                // "url": "" /* Leave commented for the notification to not open a window on Chrome and Firefox (on Safari, it opens to your webpage) */
            }

        }]);
        OneSignal.push(["sendTags", {user_id : "{{Auth::user()->id}}", email : "{{Auth::user()->email}}"}]);
    </script>
</head>
<body>
    <div id="app">
      
      <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span>
                                    <img alt="image" class="" src="{{URL::asset('images/etl-logo.png')}}" width="150" height="50">
                                     </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">{{Auth::check()?Auth::user()->name:' '}}</strong>
                                     </span> <span class="text-muted text-xs block">{{(Auth::user()->role == 1) ? 'Admin':'Employee'}} <b
                                            class="caret"></b></span> </span> 
                                             <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                            
                                                <li><a href="{{url('/user-profile')}}">Profile</a></li>
                                                <li><a href="{{url('/change-password')}}">Change password</a></li>
                                                <li class="divider"></li>
                                                <li><a href="/auth/logout">Logout</a></li>
                                            </ul>


                                            </a>
                                    
                            </div>

                            <div class="logo-element">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                        </li>
                        <li class="active">
                            <a href="/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{url('compose-mail')}}">Compose</a></li>
                                <li><a href="{{url('mail-inbox')}}"> Inbox <span class="badge padge-danger pull-right">{{Session::get('inbox')}}</span></a></li>
                                <li><a href="{{url('mail-sent')}}">Sent</a></li>
                            </ul>
                        </li>

                        @if(Auth::check() && Auth::user()->role == 1)
                        <li>
                            <a href="#"><i class="fa fa-paper-plane"></i> <span class="nav-label">Applications </span> <span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{url('application-inbox')}}"> Inbox <span class="badge padge-danger pull-right">{{Session::get('admin_inbox_count')}}</span></a></li>
                                
                            </ul>

                        </li>


                        @else
                        <li>
                            <a href="#"><i class="fa fa-paper-plane"></i> <span class="nav-label">Applications </span> <span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{url('compose-application')}}">Compose</a></li>
                                <li><a href="{{url('sent-applications')}}">Sent Applications <span class="badge padge-danger pull-right">{{Session::get('user_sentbox_count')}}</span></a></li>
                                
                            </ul>

                        </li>


                        @endif

                        
                        @if(Auth::user()->role == 1)
                        
                        <li>
                            <a href="#"><i class="fa fa-drivers-license"></i> <span class="nav-label">Notices </span> <span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{url('compose-notice')}}">Compose</a></li>
                                <li><a href="{{url('notice-board')}}">Notice board </a></li>
                                
                            </ul>

                        </li>


                        @else
                        <li>
                            <a href="{{url('notice-board')}}"><i class="fa fa-drivers-license"></i> <span class="nav-label">Notices</span> </a>

                        </li>


                        @endif
                        
                        @if(Auth::user()->role == 1)
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-users"></i> <span class="nav-label">Employee</span> <span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{url('/add-employee')}}"><span class="fa fa-plus"></span> Add employee</a></li>
                                <li><a href="{{url('/employee-list')}}"><span class="fa fa-users"></span> Employee list</a></li>
                            </ul>

                        </li>
                        @else
                        <li>
                            <a href="{{url('/employee-list')}}"><i class="fa fa-users"></i> <span class="nav-label">Employee list</span></a>
                            

                        </li>
                        @endif
                        
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-list-ul"></i> <span class="nav-label">Salary</span> <span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                @if(Auth::user()->role == 1)
                                <li><a href="{{url('select-loan-user')}}"><span class="fa fa-money"></span> Loan</a></li>
                                {{--<li><a href="{{url('loan-statement')}}"><span class="fa fa-money"></span> Loan statement</a></li>--}}
                                <li><a href="{{url('provident-fund')}}"><span class="fa fa-shopping-cart"></span> Provident fund</a></li>

                                <li><a href="{{url('date-selection')}}"><span class="fa fa-plus"></span> Make salary sheet</a></li>
                                <li><a href="{{url('/sheet-selection')}}"><span class="fa fa-bars"></span> View salary sheet</a></li>
                                @else
                                <li><a href="{{url('/my-salary')}}"><span class="fa fa-bars"></span> View my salary sheet</a></li>
                                <li><a href="{{url('/my-provident-fund')}}"><span class="fa fa-shopping-cart"></span> Provident fund</a></li>
                                @endif
                            </ul>

                        </li>

                        @if(Auth::user()->role == 1)
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{url('date-config')}}">Set vacations</a></li>
                                <li><a href="{{url('upload-pos')}}">Insert attendance data</a></li>
                                <li><a href="{{url('get-entry-time')}}">Set entry time</a></li>
                                <li><a href="{{url('get-late-absence')}}">Set late and absence</a></li>
                            </ul>

                        </li>
                        @endif
                        @if(Auth::user()->role == 1)
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-shopping-bag"></i> <span class="nav-label">Resources</span> <span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{url('up-resource')}}">Upload</a></li>
                                    <li><a href="{{url('resource-list')}}">Resource List</a></li>

                                </ul>

                            </li>
                        @else
                            <li>
                                <a href="{{url('resource-list')}}"> <span class="fa fa-shopping-bag"></span> <span class="nav-label"> Resources</span></a>
                            </li>
                        @endif

                        @if(Auth::user()->role == 1)
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-balance-scale"></i> <span class="nav-label">Performance</span> <span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{url('performance')}}">Appraiser</a></li>
                                    {{--<li><a href="{{url('resource-list')}}">Performace sheet</a></li>--}}

                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-book"></i> <span class="nav-label">Report</span> <span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{url('select-report-month')}}">Reports</a></li>
                                </ul>

                            </li>
                        @else
                            <li>
                                <a href="{{url('my-performance')}}"> <span class="fa fa-balance-scale"></span> <span class="nav-label"> Performance</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-book"></i> <span class="nav-label">Report</span> <span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{url('select-date')}}">Add reports</a></li>
                                    <li><a href="{{url('my-report')}}">My reports</a></li>

                                </ul>

                            </li>
                        @endif

                    </ul>

                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                            </a>
                            <form role="search" class="navbar-form-custom" method="" action="javascript:void()">
                                <div class="form-group">
                                    <input type="search"  class="form-control" placeholder="Search for someting..."
                                           name="top-search" data-dynatable-query="search" id="dynatable-query-search-example-table">
                                </div>
                            </form>
                        </div>


                    </nav>
                </div>
                <div class="row  border-bottom white-bg dashboard-header content-row">

                    @yield('content')

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrapper wrapper-content">
                            <div class="row">

                                <div class="col-lg-4">


                                </div>
                                <div class="col-lg-4">

                                </div>

                            </div>
                        </div>
                        <div class="footer">

                            <div>
                                <strong>Copyright &copy;</strong> ETL development team  2017
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

     
        
    </div>



    <!-- Scripts -->
    <script src="{{URL::asset('/js/app.js')}}"></script>
    <script src="{{URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('js/plugins/slimscroll/jquery.slimscrol.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>

    <script src="{{URL::asset('js/inspinia.js')}}"></script>

    <script src="{{URL::asset('js/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{url('js/custom-file-input.js')}}"></script>
    <script src="{{url('js/jquery.dynatable.js')}}"></script>
    <script src="{{url('js/select2.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>



    
    @yield('scripts')
</body>
</html>
