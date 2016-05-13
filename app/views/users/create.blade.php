<div class="page-header">
    <h1 class="">Create a User</h1>
    <a href="{{ URL::to('users') }}" class="btn btn-info">Users</a>
</div>

<div class="col-md-8 col-md-offset-2">

    @include('partials.notifications')

    {{ Form::open(array('url' => 'users', 'class' => 'form-horizontal')) }}

    <div class="form-group">
        {{ Form::label('username', 'Username', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('role_id', 'User Level', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::select('role_id', $roles, Input::old('role_id'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            {{ Form::submit('Create the User!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}

</div>