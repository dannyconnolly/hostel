<div class="page-header">
    <h1 class="">Hostels</h1>
    <a href="{{ URL::to('hostels/create') }}" class="btn btn-info">Create a Hostel</a>
</div>

<div class="col-md-12">

    @include('partials.notifications')

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID<i class="fa fa-sort"></i></th>
                <th>Hostel Name<i class="fa fa-sort"></i></th>
                <th>Open From<i class="fa fa-sort"></i></th>
                <th>Open To<i class="fa fa-sort"></i></th>
                <th class="action-column">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hostels as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->open_from }}</td>
                <td>{{ $value->open_to }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td class="action-column">
                    <!-- show the hostel (uses the show method found at GET /hostels/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('hostels/' . $value->id) }}"><i class="fa fa-eye"></i></a>

                    <!-- edit this hostel (uses the edit method found at GET /hostels/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('hostels/' . $value->id . '/edit') }}"><i class="fa fa-pencil"></i></a>

                    <!-- delete the hostel (uses the destroy method DESTROY /hostels/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    {{ Form::open(array('url' => 'hostels/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('&times;', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $hostels->links() }}
</div>