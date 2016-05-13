<div class="page-header">
    <h1 class="">Edit {{ $member->first_name }} {{ $member->last_name }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('members/' . $member->id) }}">View</a>
</div>

<div class="col-md-8 col-md-offset-2">
    <!-- if there are creation errors, they will show here -->
    @if ( $errors->count() > 0 )
    <div class="alert alert-danger">
        {{ HTML::ul($errors->all()) }}
    </div>
    @endif

    {{ Form::model($member, array('route' => array('members.update', $member->id), 'class' => 'form-horizontal', 'method' => 'PUT')) }}
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('first_name', 'First Name', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                {{ Form::text('first_name', null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('last_name', 'Last Name', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                {{ Form::text('last_name', null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                {{ Form::email('email', null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('date_of_birth', 'Date of Birth', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                <div class="input-group">
                    {{ Form::text('date_of_birth', null, array('class' => 'form-control date-input')) }}
                    <span class="input-group-addon">
                        <i class="fa fa-calendar bigger-110"></i>
                    </span>
                </div>
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
                {{ Form::text('state_county', null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('postcode', 'Postcode', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                {{ Form::text('postcode', null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('country', 'Country', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                {{ Form::select('country', $countries, null, array('class' => 'form-control')) }}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('phone_1', 'Primary Contact Number', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                {{ Form::text('phone_1', null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('phone_2', 'Secondary Contact Number', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                {{ Form::text('phone_2', null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('membertype_id', 'Member Type', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">
                {{ Form::select('membertype_id', $membertypes, null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('comments', 'Comments', array('class' => "col-sm-4")) }}
            <div class="col-sm-8">        
                {{ Form::textarea('comments', null, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                {{ Form::submit('Edit the Member!', array('class' => 'btn btn-primary')) }}
            </div>
        </div>

    </div>

    {{ Form::close() }}
</div>