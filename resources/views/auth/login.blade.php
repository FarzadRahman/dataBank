<!DOCTYPE html>
<html>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:47:39 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>ELOC</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{url('public/logo/TCL_logo.png')}}">


    <!-- App css -->
    <link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

</head>


<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-header">
            <h3 class="text-center">
                <b class="waves-effect waves-light">ELOC DETAILS</b>
            </h3>

        </div>
        <div class="card-body">


            {{--<div align="center">--}}
            {{--<img src="{{url('public/logo/rab-logo.png')}}" height="150" width="150">--}}
            {{--</div>--}}

            <div class="p-3">
                <form method="POST" class="form-horizontal m-t-20" action="{{ route('login') }}">
                    {{csrf_field()}}

                    <div class="form-group row">
                        <div class="col-12">
                            {{--<input class="form-control" name="loginId" type="text" placeholder="login id" required>--}}
                            <input id="email" type="email" placeholder="Id" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>


                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="password" type="password" placeholder="Password" required>
                            {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}

                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            {{--<a href="{{route('dashboard')}}" class="btn btn-info btn-block waves-effect waves-light" type="submit">Log In</a>--}}


                            <button type="submit" class="btn btn-info btn-block waves-effect waves-light">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </div>


                </form>
            </div>

        </div>

        <div class="card-footer">

            <div style="text-align: center">
                © {{date('Y')}}
            </div>


        </div>
    </div>
</div>



<!-- jQuery  -->
<script src="{{url('public/assets/js/jquery.min.js')}}"></script>
<script src="{{url('public/assets/js/popper.min.js')}}"></script>
<script src="{{url('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/assets/js/modernizr.min.js')}}"></script>
<script src="{{url('public/assets/js/waves.js')}}"></script>
<script src="{{url('public/assets/js/jquery.slimscroll.js')}}"></script>

<script src="{{url('public/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('public/assets/js/jquery.scrollTo.min.js')}}"></script>

<!-- App js -->
<script src="{{url('public/')}}assets/js/app.js"></script>

</body>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:47:39 GMT -->
</html>