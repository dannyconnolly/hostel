<div class="page-header">
    <h1>Edit: {{ $eventtype->name }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('eventtypes/' . $eventtype->id) }}">View</a>
</div>
<div class="col-md-8 col-md-offset-2">

    @include('partials.notifications')

    {{ Form::model($eventtype, array('route' => array('eventtypes.update', $eventtype->id), 'class' => 'form-horizontal', 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            {{ Form::submit('Edit the Event Type!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
    {{ Form::close() }}

</div>
