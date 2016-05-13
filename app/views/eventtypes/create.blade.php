<div class="page-header">
    <h1>Create an Event Type</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('eventtypes') }}">Event Types</a>
</div>

<div class="col-md-8 col-md-offset-2">

    @include('partials.notifications')

    {{ Form::open(array('url' => 'eventtypes', 'class' => 'form-horizontal')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            {{ Form::submit('Create the Event Type!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}

</div>