@include('layouts/header')
<style>
    .alert-feedback{
        color: red;
    }

</style>
<body>

<!-- Loader -->
{{--<div id="preloader"><div id="status"><div class="spinner"></div></div></div>--}}

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Image Logo -->
                <a href="#" class="logo">
                    <h3>ELOC DETAILS</h3>
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">



                <ul class="list-inline float-right mb-0">



                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <b style="color: white">Hi {{Auth::user()->userName}}</b>
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="{{url('public/assets/images/users/avatar-1.png')}}" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                            <a class="dropdown-item" href="{{route('account.index')}}"><i class="dripicons-gear text-muted"></i>Change Password</a>
                            <div class="dropdown-divider"></div>


                            {{--Logout Button--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{csrf_field()}}
                            </form>
                        </div>
                    </li>
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    @include('layouts/navbar')
</header>
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container-fluid">
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif

        @yield('content')

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@include('layouts/footer')