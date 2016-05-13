<div class="page-header">
    <h1 class="">Edit: {{ $event->title }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('events/' . $event->id) }}">View</a>
</div>

<div class="col-md-8 col-md-offset-2">

    <!-- if there are creation errors, they will show here -->
    @include('partials.notifications')

    {{ Form::model($event, array('route' => array('events.update', $event->id), 'class' => 'form-horizontal', 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('eventtype_id', 'Event Type', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::select('eventtype_id', $eventtypes, null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('address_line_1', 'Address Line 1', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('address_line_1', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('address_line_2', 'Address Line 2', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('address_line_2', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('town_city', 'Town/City', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('town_city', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('state_county', 'State/County', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('state_county', null, array('class' => 'form-control date-input')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('latitude', 'Latitude', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('latitude', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('longitude', 'Longitude', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('longitude', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('email', 'email', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('tel', 'phone', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('url', 'url', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('url', 'url', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('cost', 'cost', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('cost', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('when', 'When', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::html5_field( 'datetime', 'when', Input::old('when'), array('class' => 'form-control')) }}
                <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('details', 'Details', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::textarea('details',  Input::old('details'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            {{ Form::submit('Edit the Event!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
    {{ Form::close() }}

</div>