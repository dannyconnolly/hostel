<div class="page-header">
    <h1>{{ $eventtype->name }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('eventtypes/' . $eventtype->id . '/edit') }}">Edit Event Type</a>
</div>

<div class="col-md-7 view">
    @include('partials.notifications')
    <p><strong>Name:</strong> {{ $eventtype->name }}</p>
</div>
