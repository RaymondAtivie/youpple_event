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
    <li class="menu-list">
        <a href="">
            <i class="fa fa-star"></i><span>Forms</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('admin/forms') }}">Forms</a></li>
        </ul>
    </li>


    <li>
        <h3 class="navigation-title">Users</h3>
    </li>
    <li>
        <a href="">
            <i class="fa fa-users"></i><span>Customers</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class="fa fa-calendar"></i><span>Events</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class="fa fa-briefcase"></i><span>Service Providers</span>
        </a>
    </li>

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
    </li>


    {{-- <li>
        <h3 class="navigation-title">Voting Management</h3>
    </li>
    <!-- <li><a href=""><i class="fa fa-home"></i> <span>Commission Settings</span></a></li> -->
    <li class="menu-list">
        <a href=""><i class="fa fa-laptop"></i>  <span>Voting Settings</span></a>
        <ul class="child-list">
            <li><a href="{{ url('admin/commissionsettings') }}">Contestants</a></li>
            <li><a href="{{ url('admin/commissionsettings/add') }}">Edit Contestant</a></li>
        </ul>
    </li>
    <li>
        <h3 class="navigation-title">Events Management</h3>
    </li>
    <li class="menu-list">
        <a href=""><i class="fa fa-laptop"></i>  <span>Events</span></a>
        <ul class="child-list">
            <li><a href="{{ url('admin/events') }}">All Events</a></li>
            <li><a href="{{ url('admin/commissionsettings') }}">Event Attendees</a></li>
            <li><a href="{{ url('admin/commissionsettings/add') }}">Create Events</a></li>
        </ul>
    </li>
    <li>
        <h3 class="navigation-title">Users Management</h3>
    </li>
    <li>
        <a href="">
            <i class="fa fa-laptop"></i>  <span>Service Providers</span>
        </a>
    </li>
    <li class="menu-list">
        <a href="">
            <i class="fa fa-laptop"></i>  <span>Customers</span>
        </a>
        <ul class="child-list">
            <li><a href="{{ url('admin/allusers') }}">All Site Users</a></li>
            <li><a href="{{ url('admin/commissionsettings/add') }}">Add/Edit User Events</a></li>
        </ul>
    </li>
    <li>
        <h3 class="navigation-title">Website Settings</h3>
    </li>
    <li><a href="{{ url('admin/settings') }}"><i class="fa fa-home"></i> <span>Settings</span></a></li>
    <li><a href="{{ url('admin/adminusers') }}"><i class="fa fa-users"></i> <span>Admin Users</span></a></li> --}}


</ul>
