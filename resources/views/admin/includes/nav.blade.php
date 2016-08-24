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
        <a href="">
            <i class="fa fa-file-text-o"></i><span>Home Page</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('admin/home/logo') }}">Logos</a></li>
            <li><a href="{{ url('admin/home/social') }}">Social Links</a></li>
            <li><a href="{{ url('admin/home/privacy') }}">Privacy Policy</a></li>
            <li><a href="{{ url('admin/home/advert') }}">Advertising partners</a></li>
            <li><a href="{{ url('admin/home/termsofuse') }}">Terms of Use</a></li>
            <li><a href="{{ url('admin/home/terms') }}">Terms & Condition</a></li>
        </ul>
    </li>
    <li class="menu-list">
        <a href="">
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
        <a href="">
            <i class="fa fa-star"></i><span>Featured</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('admin/feature/events') }}">Featured Events</a></li>
            <li><a href="{{ url('admin/feature/providers') }}">Featured Service Providers</a></li>
        </ul>
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
{{--
    <li>
        <h3 class="navigation-title">Settings</h3>
    </li>
    <li>
        <a href="">
            <i class="fa fa-cog"></i><span>General</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class="fa fa-credit-card"></i><span>Payment</span>
        </a>
    </li> --}}

</ul>
