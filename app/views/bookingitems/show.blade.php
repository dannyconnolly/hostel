<div class="page-header">
    <h1>Showing  #{{ $bookingitem->order_id }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('bookingitems/' . $bookingitem->id . '/edit') }}">Edit</a>
</div>

<div class="col-md-7 view">
    <p><strong>Order Id:</strong> {{ $bookingitem->order_id }}</p>
    <p><strong>Hostel:</strong> {{ Sitehelper::getHostelName($bookingitem->hostel_id) }}</p>
    <p><strong>Arrival Date:</strong> {{ $bookingitem->arrival_date }}</p>
    <p><strong>No.Nights:</strong> {{ $bookingitem->nights_stay }}</p>
    <p><strong>Total Guests:</strong> {{ $bookingitem->total_guests }}</p>
</div>
