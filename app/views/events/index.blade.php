<div class="page-header">
    <h1 class="">Events</h1>
    <a href="{{ URL::to('events/create') }}" class="btn btn-info">Create an Event</a>
</div>
<div class="col-md-12">
    @include('partials.notifications')

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID<i class="fa fa-sort"></i></th>
                <th>Title<i class="fa fa-sort"></i></th>
                <th>Event Type<i class="fa fa-sort"></i></th>
                <th>Cost<i class="fa fa-sort"></i></th>
                <th>When<i class="fa fa-sort"></i></th>
                <th class="action-column">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->eventtype->name }}</td>
                <td>{{ $value->cost }}</td>
                <td>{{ $value->when }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td class="action-column">
                    <!-- show the event (uses the show method found at GET /events/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('events/' . $value->id) }}"><i class="fa fa-eye"></i></a>
                    <!-- edit this event (uses the edit method found at GET /events/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('events/' . $value->id . '/edit') }}"><i class="fa fa-pencil"></i></a>

                    <!-- delete the event (uses the destroy method DESTROY /events/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    {{ Form::open(array('url' => 'events/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('&times;', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
</div>
