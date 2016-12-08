<ul class="nav nav-pills nav-stacked side-navigation">
    <li>
        <h3 class="navigation-title">Navigation</h3>
    </li>
    <li>
        <a href="{{ url('events/me') }}">
            <i class="fa fa-user"></i> <span>Basic Infromation</span>
        </a>
    </li>
    @if($user->info)
        <li>
            <a href="{{ url('events/myprofile') }}">
                <i class="fa fa-address-card-o"></i> <span>Advance Information</span>
            </a>
        </li>
    @endif
    <li class="menu-list">
        <a href="">
            <i class="fa fa-briefcase"></i><span>Service Orders</span>
        </a>
        <ul class="child-list">
            @if($user->info)
                <li><a href="{{ url('events/myorders/me') }}">
                    @if($user->info->business_name)
                        {{$user->info->business_name}}
                    @else
                        {{$user->name}}
                    @endif
                </a></li>
            @endif
            <li><a href="{{ url('events/myorders') }}">Youpple</a></li>
            <li><a href="{{ url('events/myorders/others') }}">Others</a></li>
            @if(count($user->getPaidOrders()) > 0)
                <li><a href="{{ url('events/myorders/paid') }}">Paid Orders</a></li>
            @endif
        </ul>
    </li>

    <li>
        <a href="{{ url('events/myevent') }}">
            <i class="fa fa-calendar"></i> <span>My Events</span>
        </a>
    </li>
    <br />

    @if(!$user->info)
        <li style="text-align: center">
            <a href="becomeProvider" class="btn btn-primary">Become a service provider</a>
        </li>
    @endif
</ul>
