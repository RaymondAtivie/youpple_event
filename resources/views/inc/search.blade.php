<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" @if(session()->get('search_type') != 'provider') class="active" @endif>
        <a href="#events{{$num}}" aria-controls="home" role="tab" data-toggle="tab">Search Events</a>
    </li>
    <li role="presentation" @if(session()->get('search_type') == 'provider') class="active" @endif>
        <a href="#providers{{$num}}" aria-controls="profile" role="tab" data-toggle="tab">Search Service Providers</a>
    </li>
</ul>

<!-- Tab panes -->

<div class="tab-content">
    <div role="tabpanel" class="tab-pane @if(session()->get('search_type') != 'provider') active @endif" id="events{{$num}}" style="padding: 20px;">

        <form action="{{ url("events/search/event") }}" method="POST">
        <input type="hidden" name="type" value="event" />
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" required name="title" value="{{session()->get('search_title')}}" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Event Type</label>
                        <select class="form-control" name="event_type">
                            <option value="">-- ANY --</option>
                            @foreach($intrests as $value)
                                <option value="{{$value}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>All Events before</label>
                        <input type="date" name="datebefore" value="{{session()->get('search_datebefore')}}" class="form-control" />
                        <small>Please leave blank for no date restrictions</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>All Events after</label>
                        <input type="date" name="dateafter" value="{{session()->get('search_dateafter')}}" class="form-control" />
                        <small>Please leave blank for no date restrictions</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Country</label>
                        <select name="country" class="form-control">
                            @if(session()->has('search_country') && session()->get('search_country') != "")
                                <option value="{{session()->get('search_country')}}">{{session()->get('search_country')}}</option>
                            @endif
                            <option value="">-- ANY --</option>
                            @foreach($countries as $country)
                                <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-submit btn-block">SEARCH</button>
                </div>
            </div>
        </form>

    </div>
    <div role="tabpanel" class="tab-pane @if(session()->get('search_type') == 'provider') active @endif" id="providers{{$num}}" style="padding: 20px;">
        <form action="{{ url("events/search/event") }}" method="POST">
        <input type="hidden" name="type" value="provider" />
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{session()->get('search_name')}}" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Service Type</label>
                        <select class="form-control" name="event_type">
                            @if(session()->has('search_event_type') && session()->get('search_event_type') != "")
                                <option value="{{session()->get('search_event_type')}}">{{session()->get('search_event_type')}}</option>
                            @endif
                            <option value="">-- ANY --</option>
                            @foreach($services as $key => $list)
                                <optgroup label="{{$key}}">
                                    @foreach($list as $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-submit btn-block">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
