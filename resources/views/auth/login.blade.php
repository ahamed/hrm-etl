<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HRM-Ezzetech | login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="{{URL::asset('/css/app.css')}}" rel="stylesheet">

    <link href="{{URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{URL::asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <!-- Animation Css  -->
    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">


    <style>
        #forgot{
            color: #ffffff;
            font-size: 16px;
        }
        #forgot:hover{
            text-decoration: underline;
            font-size: 18px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
   
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper">
                <div class="containers">
                    <h1>Login Panel</h1>
                    
                    <form class="form" method="post" action="{{ url('auth/login') }}" autocomplete="off">
                        {{csrf_field()}}
                        @foreach($errors as $error)
                            {{$error}}

                        @endforeach
                        <input type="text" placeholder="Username" name="email" value="{{ old('email') }}" reqiured autofocus autocomplete="off">
                                
                        
                        <input type="password" placeholder="Password" name="password" required autocomplete="off">


                        
                        <button type="submit" id="login-button">Login</button><br>
                        <!-- <a href="/auth/register" class="btn btn-link create">Create an account</a> -->
                        <br>
                        <a href="" class="" id="forgot">Forgot password?</a>
                        <br>
                        <br>
                        <br>
                        <span class="" style="color: white; margin-top: 10px !important; padding: 5px;">Copyright &copy; by <a href="https://www.etl.com.bd" style="color: white; text-decoration: underline;" target="_blank">Ezzetech</a> Development team</span>
                    </form>
                </div>
                
                <ul class="bg-bubbles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            </div>
        </div>
    </div>
     <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{URL::asset('/js/app.js')}}"></script>
    <script src="{{URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('js/plugins/slimscroll/jquery.slimscrol.js')}}""></script>

    <!-- Custom and plugin javascript -->
    <script src="{{URL::asset('js/inspinia.js')}}"></script>
    <!-- GITTER -->
    <!-- <script src="js/plugins/gritter/jquery.gritter.min.js"></script>-->

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>
</body>
</html>



