<div class="page-header">
    <h1 class="">{{ $event->title }}</h1>
    @if(Auth::check())
    <a class="btn btn-small btn-info" href="{{ URL::to('events/' . $event->id . '/edit') }}">Edit Event</a>
    @endif
</div>

<div class="col-md-7 view">
    @include('partials.notifications')
    <p><strong>Title:</strong> {{ $event->title }}</p>
    <p><strong>Type:</strong> {{ $event->eventtype->name }}</p>
    <p><strong>Address Line 1:</strong> {{ $event->address_line_1 }}</p>
    <p><strong>Address Line 2:</strong> {{ $event->address_line_2 }}</p>
    <p><strong>Town/City:</strong> {{ $event->town_city }}</p>
    <p><strong>State/County:</strong> {{ $event->state_county }}</p>
    <p><strong>Email:</strong> {{ $event->email }}</p>
    <p><strong>Phone:</strong> {{ $event->phone }}</p>
    <p><strong>URL:</strong> {{ $event->url }}</p>
    <p><strong>Cost:</strong> {{ $event->cost }}</p>
    <p><strong>When:</strong> {{ $event->when }}</p>
    <p><strong>Latitude:</strong> {{ $event->latitude }}</p>
    <p><strong>Longitude:</strong> {{ $event->longitude }}</p>
    <p><strong>Details:</strong><br /> {{ $event->details }}</p>
</div>