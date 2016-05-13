<div class="page-header">
    <h1>{{ $membertype->name }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('membertypes/' . $membertype->id . '/edit') }}">Edit</a>
</div>

<div class="col-md-7 view">
    @include('partials.notifications')

    <p><strong>Name:</strong> {{ $membertype->name }}</p>
    <p><strong>Cost:</strong> {{ $membertype->cost }}</p>
    <p><strong>Description:</strong><br /> {{ $membertype->description }}</p>
</div>
