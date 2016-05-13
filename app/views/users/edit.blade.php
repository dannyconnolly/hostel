<div class="page-header">
    <h1 class="">Edit {{ $user->username }}</h1>
    <a href="{{ URL::to('users/' . $user->id) }}" class="btn btn-info">View</a>
</div>
<div class="col-md-8 col-md-offset-2">

    @include('partials.notifications')

    {{ Form::model($user, array('route' => array('users.update', $user->id), 'class' => 'form-horizontal', 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('username', 'Username', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::text('username', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('role_id', 'User Level', array('class' => "col-sm-2 control-label")) }}
        <div class="col-sm-10">
            {{ Form::select('role_id', $roles, null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit('Edit the User!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}
</div>