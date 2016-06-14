@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/bootstrap-nav.css" />
<!-- Inner Banner Start -->
<div class="cp-inner-banner">
    <div class="container">
        <div class="cp-inner-banner-outer">
            <h2>Create an Event</h2>
            <!--Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/events">Events</a></li>
                <li class="active">Create</li>
            </ul><!--Breadcrumb End-->
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<style>
.form-group{
    margin-bottom: 30px
}
.cOptions label{
    font-weight: normal;
}
</style>

<!-- Main Content Start -->
<div class="cp-main-content">
    <form action="/events/create/package" method="POST">

        <!--Signup Content Start-->
        <section class="cp-signup-section pd-tb60">


            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="nav nav-wizard">
                        <li class="active"><a href="#">Basic information</a></li>
                        <li><a href="#">Packages</a></li>
                        <li><a href="#">Media</a></li>
                        <li><a href="#">Awards</a></li>
                        <li><a href="#">Partners</a></li>
                    </ul>
                </div>
            </div>

            <div class="row pd-tb60">
                <div class="col-md-6 col-md-offset-3">

                    <h2>Basic information</h2>
                    <hr />

                    <div class="form-group">
                        <label for="exampleInputEmail1">Event Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Event Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Event Description</label>
                        <textarea class="form-control" style="resize: none; border: 0px; border-bottom: 2px solid silver; " rows='4' placeholder="Event Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Event Type</label>
                        <div class="cOptions">
                            <div class="row">
                                <?php
                                $eTypes = ['Fashion show', 'Trade Fair', 'Career Fair', 'Talent Hunt', 'Talk Show', 'Training', 'Workshop', 'Seminar',
                                'Conference', 'Corporate Party', 'Tourism', 'Dinner Party', 'Pool Party', 'Carnival', 'Wedding Ceremony', 'Burial Ceremony',
                                'Engagement Party', 'Proposal Party', 'Convention', 'Sport Competition', 'Award Ceremony', 'Road Trip', 'Naming Ceremony',
                                'Birthday Party', 'Contest', 'Coronation', 'Ordination']
                                ?>
                                <?php foreach ($eTypes as $type) { ?>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="checkbox"> <?php echo $type ?>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Event Venue</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Venue 1">
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Venue 2">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Event Date and Time</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-block btn-lg btn-submit">Next</button>
                    </div>
                </div>
            </section><!--Signup Section Content End-->

        </form>
    </div>
    <!-- Main Content End -->

@endsection
