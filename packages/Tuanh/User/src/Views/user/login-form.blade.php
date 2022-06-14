<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="BucketAdmin/html/images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="BucketAdmin/html/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="BucketAdmin/html/css/bootstrap-reset.css" rel="stylesheet">
    <link href="BucketAdmin/html/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="BucketAdmin/html/css/style.css" rel="stylesheet">
    <link href="BucketAdmin/html/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

    <div class="container">

        @if(Session::has('error'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
        @endif


        <form class="form-signin" method="post" action="{{ route('login.post') }}">
            @csrf
            <h2 class="form-signin-heading">sign in now</h2>
            <div class="login-wrap">
                <div class="user-login-info">
                    <input type="text" name="email" class="form-control" placeholder="User ID" autofocus>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="BucketAdmin/html/#myModal"> Forgot Password?</a>

                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

                <div class="registration">
                    Don't have an account yet?
                    <a class="" href="BucketAdmin/html/registration.html">
                        Create an account
                    </a>
                </div>

            </div>

            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
                class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" placeholder="Email" autocomplete="off"
                                class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-success" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

        </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="BucketAdmin/html/js/jquery.js"></script>
    <script src="BucketAdmin/html/bs3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>


</body>

</html>