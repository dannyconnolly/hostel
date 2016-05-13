<div class="page-header">
    <h1>Member Types</h1>
    <a href="{{ URL::to('membertypes/create') }}" class="btn btn-info">Create a Member Type</a>
</div>

<div class="col-md-12">

    @include('partials.notifications')

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID<i class="fa fa-sort"></i></th>
                <th>Name<i class="fa fa-sort"></i></th>
                <th>Description<i class="fa fa-sort"></i></th>
                <th>Cost<i class="fa fa-sort"></i></th>
                <th class="action-column">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($membertypes as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->cost }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td class="action-column">
                    <!-- show the membertype (uses the show method found at GET /membertypes/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('membertypes/' . $value->id) }}"><i class="fa fa-eye"></i></a>

                    <!-- edit this membertype (uses the edit method found at GET /membertypes/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('membertypes/' . $value->id . '/edit') }}"><i class="fa fa-pencil"></i></a>

                    <!-- delete the membertype (uses the destroy method DESTROY /membertypes/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    {{ Form::open(array('url' => 'membertypes/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('&times;', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $membertypes->links() }}
</div>