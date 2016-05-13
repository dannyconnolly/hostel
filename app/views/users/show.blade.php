<div class="page-header">
    <h1 class="">{{ $user->username }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit</a>
</div>

<div class="col-md-7 view">
    @include('partials.notifications')

    <p><strong>Username:</strong> {{ $user->username }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Level:</strong> {{ SiteHelper::getRoleName($user->role_id) }}</p>
</div>
