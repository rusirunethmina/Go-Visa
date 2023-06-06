<ul class="nav navbar-nav side-nav nicescroll-bar">
    <li>
        <a href="{{ route('account.dashboard') }}" class="{{ request()->routeIs('account.dashboard') ? 'active' : '' }}"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
    </li>

    @if(auth()->user()->role == 'admin')
    <li>
        <a href="{{ route('admin.dashboard') }}"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Admin Dashboard</span></div><div class="clearfix"></div></a>
    </li>
    @endif

    @if(auth()->user()->role == 'provider')
        <li>
            <a href="{{ route('account.documents.verify') }}" class="{{ request()->routeIs('account.documents.verify') ? 'active' : '' }}"><div class="pull-left"><i class="ti-widget mr-20"></i><span class="right-nav-text">Verify</span></div><div class="clearfix"></div></a>
        </li>
        <li>
            <a href="{{ route('account.subscriptions') }}" class="{{ request()->routeIs('account.subscriptions') ? 'active' : '' }}"><div class="pull-left"><i class="ti-layout-media-overlay-alt-2 mr-20"></i><span class="right-nav-text">Subscriptions</span></div><div class="clearfix"></div></a>
        </li>

      
        <li>
            <a href="{{ route('account.testimonials') }}" class="{{ request()->routeIs('account.testimonials') ? 'active' : '' }}"><div class="pull-left"><i class="icon-book-open mr-20"></i></i><span class="right-nav-text">Testimonials</span></div><div class="clearfix"></div></a>
        </li>

    @endif
    <li>
        <a href="{{ route('account.chat') }}" class="{{ request()->routeIs('account.chat') ? 'active' : '' }}"><div class="pull-left"><i class=" ti-comments mr-20"></i><span class="right-nav-text">Chat</span></div><div class="clearfix"></div></a>
    </li>
    <li>
            <a href="{{ route('account.booking') }}" class="{{ request()->routeIs('account.booking') ? 'active' : '' }}"><div class="pull-left"><i class="ti-calendar mr-20"></i><span class="right-nav-text">Bookings</span></div><div class="clearfix"></div></a>
    </li>
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#comp_dr"><div class="pull-left"><i class="ti-settings mr-20"></i><span class="right-nav-text">Settings</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
        <ul id="comp_dr" class="collapse collapse-level-1">
            <li>
                <a href="{{ route('account.settings.change_password') }}">Change Password</a>
            </li>
            <li>
                <a href="{{ route('account.profile') }}">Update Profile</a>
            </li>
        </ul>
    </li>
</ul>