<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <ul class="nav nav-wizard">

            <li @if($page == 'create') class="active" @endif ><a>Basic information</a></li>
            <li @if($page == 'packages') class="active" @endif ><a href="{{ url("events/create/package") }}">Packages</a></li>
            <li @if($page == 'awards') class="active" @endif ><a href="{{ url("events/create/awards") }}">Awards</a></li>
            <li @if($page == 'sponsors') class="active" @endif ><a href="{{ url("events/create/sponsors") }}">Partners</a></li>
        </ul>
    </div>
</div>
