<div class="page-header">
    <h1 class="">Events</h1>
</div>
<div class="col-md-12">
    @include('partials.notifications')

    <ul class="list-group event-list-group">
        @foreach($events as $key => $value)
        <li class="list-group-item">
            <div class="media">
                <div class="pull-left">
                    <a href="{{ URL::to('events/' . $value->id) }}">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
                    </a>
                    <a class="btn btn-primary btn-block" href="{{ URL::to('events/' . $value->id) }}">View</a>
                    <a class="btn btn-success btn-block" href="{{ URL::to('book-event/' . $value->id) }}">Book</a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><a href="{{ URL::to('events/' . $value->id) }}">{{ $value->title }}</a></h4>
                    <small>When {{ $value->when }}</small>
                    <p>{{ str_limit($value->details, 120) }}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    {{ $events->links() }}
</div>
