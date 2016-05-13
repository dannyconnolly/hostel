<div class="page-header">
    <h1>Create a Member Type</h1>
    <a href="{{ URL::to('membertypes') }}" class="btn btn-info">Member Types</a>
</div>

<div class="col-md-8 col-md-offset-2">

    @include('partials.notifications')

    {{ Form::open(array('url' => 'membertypes', 'class' => 'form-horizontal')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('cost', 'Cost', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('cost',Input::old('cost'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            {{ Form::submit('Create the MemberType!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}
</div>