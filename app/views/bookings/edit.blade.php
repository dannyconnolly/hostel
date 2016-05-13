<div class="col-md-10">
    <h1>Edit {{ $booking->bookingname }}</h1>
</div>
<div class="col-md-2">
    <a href="{{ URL::to('bookings') }}" class="btn btn-info">Bookings</a>
</div>

<div class="col-md-8 col-md-offset-2">

    @include('partials.notifications')

    {{ Form::model($booking, array('route' => array('bookings.update', $booking->id), 'class' => 'form-horizontal', 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('first_name', 'First Name', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('first_name', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last Name', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('last_name', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('date_of_birth', 'Date of Birth', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('date_of_birth', null, array('class' => 'form-control date-input')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('address_line_2', 'Address Line 2', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('address_line_2', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('town_city', 'Town/City', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('town_city', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('state_county', 'State/County', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('state_county', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('country_id', 'Address Line 1', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::select('country_id', $countries, null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('post_code', 'Post Code', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('post_code', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone_1', 'Phone 1', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('phone_1', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone_2', 'Phone 1', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('phone_2', null, array('class' => 'form-control')) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('comments', 'Any Additional Comments?', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::textarea('comments', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit('Edit the Booking!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}
</div>