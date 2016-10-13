<ul class="nav nav-pills nav-stacked side-navigation">

    <li>
        <h3 class="navigation-title">Navigation</h3>
    </li>
    <li>
        <a href="{{ url('admin') }}">
            <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
    </li>

    <li>
        <h3 class="navigation-title">Page Settings</h3>
    </li>
    <li class="menu-list">
        <a href="#">
            <i class="fa fa-file-text-o"></i><span>Home Page</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('admin/home/logo') }}">Logos</a></li>
            <li><a href="{{ url('admin/home/social') }}">Social Links</a></li>
            <li><a href="{{ url('admin/home/privacy') }}">Privacy Policy</a></li>
            <li><a href="{{ url('admin/home/faq') }}">FAQ</a></li>
            <li><a href="{{ url('admin/home/advert') }}">Advertising partners</a></li>
            <li><a href="{{ url('admin/home/termsofuse') }}">How it works</a></li>
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
            <i class="fa fa-users"></i><span>Manage Event types</span>
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
            <i class="fa fa-briefcase"></i><span>Service Providers</span>
        </a>
    </li>
    <li>
        <a href="{{ url('admin/list/orders') }}">
            <i class="fa fa-briefcase"></i><span>Service Orders</span>
        </a>
    </li>

    @if(Auth::guard('admin')->user()->role == "superadmin")
        <li>
            <h3 class="navigation-title">Reaching Out</h3>
        </li>
        <li class="menu-list">
            <a href="#">
                <i class="fa fa-star"></i><span>Send SMS</span>
            </a>
            <ul class="child-list">
                <li><a href="{{ url('admin/feature/events') }}">To Everyone</a></li>
                <li><a href="{{ url('admin/feature/providers') }}">To All Service Providers</a></li>
                <li><a href="{{ url('admin/feature/providers') }}">To Individual Service Providers</a></li>
                <li><a href="{{ url('admin/feature/providers') }}">To Business Service Providers</a></li>
                <li><a href="{{ url('admin/feature/providers') }}">To Customers</a></li>
            </ul>
        </li>
        <li class="menu-list">
            <a href="#">
                <i class="fa fa-star"></i><span>Send Email</span>
            </a>
            <ul class="child-list">
                <li><a href="{{ url('admin/feature/events') }}">Add an Admin</a></li>
                <li><a href="{{ url('admin/feature/providers') }}">View Administrators</a></li>
            </ul>
        </li>
        <li>
            <h3 class="navigation-title">Settings</h3>
        </li>
        <li class="menu-list">
            <a href="#">
                <i class="fa fa-star"></i><span>User Management</span>
            </a>
            <ul class="child-list">
                <li><a href="{{ url('admin/feature/events') }}">Add an Admin</a></li>
                <li><a href="{{ url('admin/feature/providers') }}">View Administrators</a></li>
            </ul>
        </li>
        <li>
            <h3 class="navigation-title">Payments</h3>
        </li>
        <li>
            <a href="{{ url('admin/payments/due') }}">
                <i class="fa fa-users"></i><span>Payments Due (SP)</span>
            </a>
        </li>
        <li>
            <a href="{{ url('admin/payments/history') }}">
                <i class="fa fa-users"></i><span>Payments History</span>
            </a>
        </li>
    @endif


</ul>
