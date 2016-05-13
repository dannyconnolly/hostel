<div class="page-header">
    <h1>Customer Invoice for Order  #{{ $booking->order_id }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('bookings/' . $booking->id . '/edit') }}">Edit</a>
    <a class="btn btn-small btn-info" href="">Print</a>
</div>
<div class="col-md-12">
    @include('partials.notifications')
</div>
<div class="invoice-page">

    <div class="col-md-12 view">
        <div class="row">
            <div class="col-sm-6">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" width="140" height="140">
                <h5>From:</h5>
                <address>
                    <strong>H Manager</strong><br>
                    123 Main St,<br>
                    Rathcoole, Co. Dublin<br>
                    <abbr title="Phone">P:</abbr> (123) 601-4590
                </address>
            </div>

            <div class="col-sm-6 text-right">
                <h4>Invoice No.</h4>
                <h4 class="text-navy">{{ $booking->order_id }}</h4>
                <span>To:</span>
                <address>
                    <strong>{{ $booking->first_name }} {{ $booking->last_name }}</strong><br>
                    {{ $booking->address_line_1 }} {{ $booking->address_line_2 }}<br>
                    {{ $booking->town_city }}, {{ $booking->state_county }}<br>
                    {{ SiteHelper::getCountryName($booking->country_id) }}, {{ $booking->post_code }}<br>
                    <abbr title="Phone">P:</abbr> {{ $booking->phone_1 }}
                </address>
                <p>
                    <span><strong>Invoice Date:</strong>{{ date("F j, Y, g:i a", strtotime($booking->created_at)) }}</span><br>
                    <span><strong>Due Date:</strong> {{ date("F j, Y", strtotime("+30 days", strtotime($booking->created_at))) }}</span>
                </p>
            </div>
        </div>

        <div class="col-md-12">
            <div class="page-header">
                <h2>Booking Details</h2>
            </div>
            <table class="table invoice-table">
                <thead>
                    <tr>
                        <th>Hostel</th>
                        <th>Arrival Date</th>
                        <th>No. Nights</th>
                        <th>Total Guests</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookingitems as $key => $value)
                    <tr>
                        <td>{{ SiteHelper::getHostelName($value->hostel_id) }}</td>
                        <td>{{ $value->arrival_date }}</td>
                        <td>{{ $value->nights_stay }}</td>
                        <td>{{ $value->total_guests }}</td>
                        <td>price goes here</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right"><strong>VAT</strong></td>
                        <td>Vat goes here</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right"><strong>Total</strong></td>
                        <td>Total goes here</td>
                    </tr>
                </tbody>
            </table>
            <div class="invoice-note">
                * Make all cheques payable to [Your Company Name]<br>
                * Payment is due within 30 days<br>
                * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
            </div>
            <div class="invoice-footer text-muted">
                <p class="text-center m-b-5">
                    THANK YOU FOR YOUR BUSINESS
                </p>
                <p class="text-center">
                    <span class="m-r-10"><i class="fa fa-globe"></i> dannyconnolly.me</span>
                    <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
                    <span class="m-r-10"><i class="fa fa-envelope"></i> info@dannyconnolly.me</span>
                </p>
            </div>
        </div>
    </div>
</div>
