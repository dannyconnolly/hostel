<div class="page-header">
    <h1 class="">Create Event</h1>
    <a href="{{ URL::to('events') }}" class="btn btn-info">Events</a>
</div>

<div class="col-md-8 col-md-offset-2">

    @include('partials.notifications')

    {{ Form::open(array('url' => 'events', 'class' => 'form-horizontal')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('eventtype_id', 'Event Type', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::select('eventtype_id', $eventtypes, Input::old('eventtype_id'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('address_line_1', 'Address Line 1', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('address_line_1',Input::old('address_line_1'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('address_line_2', 'Address Line 2', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('address_line_2', Input::old('address_line_2'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('town_city', 'Town/City', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('town_city', Input::old('town_city'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('state_county', 'State/County', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('state_county', Input::old('state_county'), array('class' => 'form-control date-input')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('latitude', 'Latitude', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('latitude', Input::old('latitude'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('longitude', 'Longitude', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('longitude', Input::old('longitude'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('email', 'email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('tel', 'phone', Input::old('phone'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('url', 'url', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('url', 'url', Input::old('url'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('cost', 'cost', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('cost', Input::old('url'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('when', 'When', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::html5_field( 'date', 'when', Input::old('when'), array('class' => 'form-control')) }}
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
            {{ Form::submit('Create the Event!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}

</div>
