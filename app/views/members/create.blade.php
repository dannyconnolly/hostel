<div class="page-header">
    <h1 class="">Become a Member</h1>
</div>

<div class="col-md-8 col-md-offset-2">

    @include('partials.notifications')

    {{ Form::open(array('url' => 'members', 'class' => 'form-horizontal')) }}

    <div class="form-group">
        {{ Form::label('first_name', 'First Name', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last Name', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('date_of_birth', 'Date of Birth', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('date_of_birth', Input::old('date_of_birth'), array('class' => 'form-control date-input')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('address_line_1', 'Address Line 1', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('address_line_1', Input::old('address_line_1'), array('class' => 'form-control')) }}
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
            {{ Form::text('state_county', Input::old('state_county'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('postcode', 'Postcode', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('postcode', Input::old('postcode'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('country', 'Country', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::select('country', $countries, Input::old('address_country'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone_1', 'Primary Contact Number', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('phone_1', Input::old('phone_1'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone_2', 'Secondary Contact Number', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('phone_2', Input::old('phone_2'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('membertype_id', 'Member Type', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::select('membertype_id', $membertypes, Input::old('membertype_id'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('comments', 'Comments', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::textarea('comments', Input::old('comments'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            {{ Form::submit('Create the Member!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}
</div>