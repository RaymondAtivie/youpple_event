<ul class="nav nav-pills nav-stacked side-navigation">
    <li>
        <h3 class="navigation-title">Navigation</h3>
    </li>
    <li><a href="{{ url('admin') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    <li class="menu-list">
        <a href=""><i class="fa fa-laptop"></i>  <span>Layouts</span></a>
        <ul class="child-list">
            <li><a href="boxed-layout.html"> Boxed Page</a></li>
            <li><a href="collapsed-menu.html"> Sidebar Collapsed</a></li>
            <li><a href="different-theme-layouts.html"> Different Theme Layouts</a></li>
        </ul>
    </li>
    <li>
        <h3 class="navigation-title">Commissions Management</h3>
    </li>
    <!-- <li><a href=""><i class="fa fa-home"></i> <span>Commission Settings</span></a></li> -->
    <li class="menu-list">
        <a href=""><i class="fa fa-laptop"></i>  <span>Commission Settings</span></a>
        <ul class="child-list">
            <li><a href="{{ url('admin/commissionsettings') }}"> Commission Settings</a></li>
            <li><a href="{{ url('admin/commissionsettings/add') }}">Add Commission Setting</a></li>
        </ul>
    </li>
    <li>
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
          ``<li><a href="{{ url('admin/events') }}">All Events</a></li>
            <li><a href="{{ url('admin/commissionsettings') }}">Event Attendees</a></li>
            <li><a href="{{ url('admin/commissionsettings/add') }}">Create Events</a></li>
        </ul>
    </li>
    <li>
        <h3 class="navigation-title">Users Management</h3>
    </li>
    <li class="menu-list">
        <a href=""><i class="fa fa-laptop"></i>  <span>Site Users</span></a>
        <ul class="child-list">
            <li><a href="{{ url('admin/allusers') }}">All Site Users</a></li>
            <li><a href="{{ url('admin/commissionsettings/add') }}">Add/Edit User Events</a></li>
        </ul>
    </li>
    <li>
        <h3 class="navigation-title">Website Settings</h3>
    </li>
    <li><a href="{{ url('admin/settings') }}"><i class="fa fa-home"></i> <span>Settings</span></a></li>
    <li><a href="{{ url('admin/adminusers') }}"><i class="fa fa-users"></i> <span>Admin Users</span></a></li>


</ul>
