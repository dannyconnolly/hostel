<div class="page-header">
    <h1 class="">Create a Hostel</h1>
    <a href="{{ URL::to('hostels') }}" class="btn btn-info">Hostels</a>
</div>

<div class="col-md-12">

    @include('partials.notifications')

    {{ Form::open(array('url' => 'hostels', 'class' => 'form-horizontal')) }}

    <div class="form-group col-md-4">
        {{ Form::label('name', 'Name') }}
        <div class="col-sm-8">
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('address_line_1', 'Address Line 1' )}}
        <div class="col-sm-8">
            {{ Form::text('address_line_1', Input::old('address_line_1'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('address_line_2', 'Address Line 2') }}
        <div class="col-sm-8">
            {{ Form::text('address_line_2', Input::old('address_line_2'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('town_city', 'Town/City') }}
        <div class="col-sm-8">
            {{ Form::text('town_city', Input::old('town_city'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('state_county', 'County') }}
        <div class="col-sm-8">
            {{ Form::select('state_county', $counties, Input::old('state_county'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('latitude', 'Latitude') }}
        <div class="col-sm-8">
            {{ Form::text('latitude', Input::old('latitude'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('longitude', 'Longitude') }}
        <div class="col-sm-8">
            {{ Form::text('longitude', Input::old('longitude'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('email', 'Booking Email') }}
        <div class="col-sm-8">
            {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('phone', 'Phone') }}
        <div class="col-sm-8">
            {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('website', 'Website') }}
        <div class="col-sm-8">
            {{ Form::url('website', Input::old('website'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('photo', 'Photo') }}
        <div class="col-sm-8">
            {{ Form::text('photo', Input::old('photo'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('open_from', 'Open From')}}
        <div class="col-sm-8">
            {{ Form::text('open_from', Input::old('open_from'), array('class' => 'form-control date-input')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('open_to', 'Open To') }}
        <div class="col-sm-8">
            {{ Form::text('open_to', Input::old('open_to'), array('class' => 'form-control date-input')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('snr_price', 'Snr Price') }}
        <div class="col-sm-8">
            {{ Form::text('snr_price', Input::old('snr_price'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('jnr_price', 'Jnr Price') }}
        <div class="col-sm-8">
            {{ Form::text('jnr_price', Input::old('jnr_price'), array('class' => 'form-control date-input')) }}
        </div>
    </div>

    <div class="form-group clear">
        {{ Form::label('description', 'Description') }}
        <div class="col-sm-8">
            {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class=" form-group col-md-4">
        <div class="col-sm-offset-4 col-sm-8">
            {{ Form::submit('Create the Hostel!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}
</div>