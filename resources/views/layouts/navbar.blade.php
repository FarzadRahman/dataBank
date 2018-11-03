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
                    <a href="{{route('party.index')}}"><i class="fa fa-table"></i>Committee</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ti-settings"></i>Settings</a>
                    <ul class="submenu">
                        <li><a href="{{route('candidates.viewAll')}}">All Candidate's</a></li>
                        <li><a href="{{route('division.index')}}">Division's</a></li>
                        <li><a href="{{route('zilla.index')}}">Zilla</a></li>
                        <li><a href="{{route('upzilla.index')}}">Upzilla</a></li>
                        <li><a href="{{route('union.index')}}">Union</a></li>
                        <li><a href="{{route('pouroshova.index')}}">Pouroshova</a></li>
                        <li><a href="{{route('party.index')}}">Party</a></li>
                        <li><a href="{{route('user.index')}}">User</a></li>

                    </ul>
                </li>

            </ul>
            <!-- End navigation menu -->
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>