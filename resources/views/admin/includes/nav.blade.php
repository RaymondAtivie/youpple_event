<ul class="nav nav-pills nav-stacked side-navigation">

    <li>
        <h3 class="navigation-title">Navigation</h3>
    </li>
    <li>
        <a href="{{ url('admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li>
        <h3 class="navigation-title">Page Settings</h3>
    </li>
    <li class="menu-list">
        <a href="#">
            </i><i class="fa fa-file-text-o"></i><span>Home Page</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('admin/home/logo') }}">Logos</a></li>
            <li><a href="{{ url('admin/home/social') }}">Social Links</a></li>
            <li><a href="{{ url('admin/home/privacy') }}">Privacy Policy</a></li>
            <li><a href="{{ url('admin/home/faq') }}">FAQ</a></li>
            <li><a href="{{ url('admin/home/advert') }}">Advertising Partners</a></li>
            <li><a href="{{ url('admin/home/termsofuse') }}">How it Works</a></li>
            <li><a href="{{ url('admin/home/terms') }}">Terms & Condition</a></li>
        </ul>
    </li>
    <li class="menu-list">
        <a href="#">
            <i class="fa fa-file-text-o"></i><span>About Page</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('admin/about/info') }}">Information</a></li>
            <li><a href="{{ url('admin/about/team') }}">Team</a></li>
            <li><a href="{{ url('admin/about/partners') }}">Partners</a></li>
            <li><a href="{{ url('admin/about/clients') }}">Clients</a></li>
            <li><a href="{{ url('admin/about/testimonials') }}">Testimonials</a></li>
        </ul>
    </li>
    <li class="menu-list">
        <a href="#">
            <i class="fa fa-star"></i><span>Featured</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('admin/feature/events') }}">Featured Events</a></li>
            <li><a href="{{ url('admin/feature/providers') }}">Featured Service Providers</a></li>
        </ul>
    </li>
    <li>
        <a href="{{ url('admin/eventtypes') }}">
            <i class="fa fa-cogs"></i><span>Manage Event Types</span>
        </a>
    </li>

    <li>
        <h3 class="navigation-title">Users</h3>
    </li>
    <li>
        <a href="{{ url('admin/list/customers') }}">
            <i class="fa fa-users"></i><span>Users</span>
        </a>
    </li>
    <li>
        <a href="{{ url('admin/list/events') }}">
            <i class="fa fa-calendar"></i><span>Events</span>
        </a>
    </li>
    <li>
        <a href="{{ url('admin/list/providers') }}">
            <i class="fa fa-user-circle-o"></i><span>Service Providers</span>
        </a>
    </li>
    <li>
        <a href="{{ url('admin/list/orders') }}">
            <i class="fa fa-briefcase"></i><span>Service Orders</span>
        </a>
    </li>

    @if(Auth::guard('admin')->user()->role != "admin")
        <li>
            <h3 class="navigation-title">Reaching Out</h3>
        </li>
        <li>
            <a href="{{ url('admin/sendemail') }}">
                <i class="fa fa-envelope-o"></i><span>Send Emails</span>
            </a>
        </li>
        <li>
            <a href="{{ url('admin/sendsms') }}">
                <i class="fa fa-envelope"></i><span>Send SMS</span>
            </a>
        </li>
        @if(Auth::guard('admin')->user()->role == "superadmin")
            <li>
                <h3 class="navigation-title">Settings</h3>
            </li>
            <li>
                <a href="{{ url('admin/admin') }}">
                    <i class="fa fa-user-plus"></i><span>User Management</span>
                </a>
            </li>
        @endif
        <li>
            <h3 class="navigation-title">Payments</h3>
        </li>
        <li>
            <a href="{{ url('admin/payments/due') }}">
                <i class="fa fa-credit-card-alt"></i><span>Payments Due (SP)</span>
            </a>
        </li>
        {{-- <li>
            <a href="{{ url('admin/payments/history') }}">
                <i class="fa fa-users"></i><span>Payments History</span>
            </a>
        </li> --}}
        <li>
            <a href="{{ url('admin/payments/rates') }}">
                <i class="fa fa-money"></i><span>Currency Rates</span>
            </a>
        </li>
    @endif


</ul>
