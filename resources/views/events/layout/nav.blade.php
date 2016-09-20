<ul class="nav nav-pills nav-stacked side-navigation">
    <li>
        <h3 class="navigation-title">Navigation</h3>
    </li>
    <li>
        <a href="{{ url('events/me') }}">
            <i class="fa fa-user"></i> <span>My Profile</span>
        </a>
    </li>
    <li class="menu-list">
        <a href="">
            <i class="fa fa-file-text-o"></i><span>Service Orders</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('events/myorders') }}">Made to Youpple</a></li>
            <li><a href="{{ url('events/myorders/others') }}">Made to Service Providers</a></li>
            @if($user->info)
                <li><a href="{{ url('events/myorders/me') }}">Made to me</a></li>
            @endif
        </ul>
    </li>
    @if($user->info)
        <li>
            <a href="{{ url('events/myprofile') }}">
                <i class="fa fa-user"></i> <span>Service Provider Details</span>
            </a>
        </li>
    @endif
    <li>
        <a href="{{ url('events/myevent') }}">
            <i class="fa fa-tag"></i> <span>My Events</span>
        </a>
    </li>
    <br />

    @if(!$user->info)
        <li style="text-align: center">
            <a href="becomeProvider" class="btn btn-primary">Become a service provider</a>
        </li>
    @endif
</ul>
