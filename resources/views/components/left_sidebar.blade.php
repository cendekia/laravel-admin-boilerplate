<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ admin_asset('images/user.jpg') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="{{ admin_url('members') }}"><i class="material-icons">group</i>Members</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="{{ admin_url('signout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ current_page() }}">
                <a href="{{ admin_url('/') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2017 <a href="javascript:void(0);">Laravel Admin Boilerplate</a>.
        </div>
        <div class="version">
            <b>Version: </b> 0.0.1-dev
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->