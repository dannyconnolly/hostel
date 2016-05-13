<div class="page-header">
    <h1 class="">Members</h1>
    <a href="{{ URL::to('members/create') }}" class="btn btn-info">Create Member</a>
</div>

<div class="col-md-12">

    @include('partials.notifications')

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID<i class="fa fa-sort"></i></th>
                <th>First Name<i class="fa fa-sort"></i></th>
                <th>Last Name<i class="fa fa-sort"></i></th>
                <th>Email<i class="fa fa-sort"></i></th>
                <th>Member Type<i class="fa fa-sort"></i></th>
                <th>Purchase Date<i class="fa fa-sort"></i></th>
                <th>Expiry Date<i class="fa fa-sort"></i></th>
                <th>Payment Received<i class="fa fa-sort"></i></th>
                <th class="action-column">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->first_name }}</td>
                <td>{{ $value->last_name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->membertype->name }}</td>
                <td>{{ $value->purchase_date }}</td>
                <td>{{ $value->expiry_date }}</td>
                <td>{{ $value->payement_recieved }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td class="action-column">
                    <!-- show the member (uses the show method found at GET /members/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('members/' . $value->id) }}"><i class="fa fa-eye"></i></a>

                    <!-- edit this member (uses the edit method found at GET /members/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('members/' . $value->id . '/edit') }}"><i class="fa fa-pencil"></i></a>

                    <!-- delete the member (uses the destroy method DESTROY /members/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    {{ Form::open(array('url' => 'members/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('&times;', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $members->links() }}
</div>