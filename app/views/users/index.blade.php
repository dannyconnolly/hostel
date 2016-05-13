<div class="page-header">
    <h1 class="">All Users</h1>
    <a href="{{ URL::to('users/create') }}" class="btn btn-info">Create User</a>
</div>

<div class="col-md-12">

    @include('partials.notifications')

    <table class="table table-striped table-bordered table-hover" id="users-table">
        <thead>
            <tr>
                <th>ID<i class="fa fa-sort"></i></th>
                <th>Username<i class="fa fa-sort"></i></th>
                <th>Email<i class="fa fa-sort"></i></th>
                <th>Role<i class="fa fa-sort"></i></th>
                <th>Actions<i class="fa fa-sort"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->role_id }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>


                    <!-- show the user (uses the show method found at GET /users/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}"><i class="fa fa-eye"></i></a>

                    <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}"><i class="fa fa-pencil"></i></a>

                    <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('&times;', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>