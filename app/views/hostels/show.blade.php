<div class="page-header">
    <h1 class="">{{ $hostel->name }}</h1>
    @if(Auth::check())
    <a class="btn btn-small btn-info" href="{{ URL::to('hostels/' . $hostel->id . '/edit') }}">Edit Hostel</a>
    @endif
</div>

<div class="col-md-12 view">
    @include('partials.notifications')
    <div class="col-md-6">
        <p><strong>Name:</strong> {{ $hostel->name }}</p>
        <p><strong>Address Line 1:</strong> {{ $hostel->address_line_1 }}</p>
        <p><strong>Address Line 2:</strong> {{ $hostel->address_line_2 }}</p>
        <p><strong>Town/City:</strong> {{ $hostel->town_city }}</p>
        <p><strong>County:</strong> {{ SiteHelper::getCOuntyName($hostel->state_county) }}</p>
        <p><strong>Latitude:</strong> {{ $hostel->latitude }}</p>
        <p><strong>Longitude:</strong> {{ $hostel->longitude }}</p>
        <p><strong>Email:</strong> {{ $hostel->email }}</p>
        <p><strong>Phone:</strong> {{ $hostel->phone }}</p>
        <p><strong>Website:</strong> <a href="{{ $hostel->website }}" target="_blank">{{ $hostel->website }}</a></p>
        <p><strong>Description:</strong><br /> {{ $hostel->description }}</p>
    </div>

    <div class="col-md-6">

        <p><strong>Photo:</strong> <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" width="140" height="140" /></p>
        <p><strong>Open From:</strong> {{ $hostel->open_from }}</p>
        <p><strong>Open To:</strong> {{ $hostel->open_to }}</p>
        <p><strong>Snr Price:</strong> {{ $hostel->snr_price }}</p>
        <p><strong>Jnr Price:</strong> {{ $hostel->jnr_price }}</p>
    </div>
</div>