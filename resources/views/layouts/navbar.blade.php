<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{route('dashboard')}}"><i class="ti-home"></i>Dashboard</a>
                </li>

                <li class="has-submenu">
                    <a href="{{route('constituency.index')}}"><i class="fa fa-table"></i>Constituency</a>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="ti-settings"></i>Settings</a>
                    <ul class="submenu">
                        <li><a href="{{route('division.index')}}">Division's</a></li>
                        <li><a href="{{route('party.index')}}">Party</a></li>
                    </ul>
                </li>

            </ul>
            <!-- End navigation menu -->
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>