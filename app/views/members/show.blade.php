<div class="page-header">
    <h1 class="">{{ $member->first_name }} {{ $member->last_name }}</h1>
    <a class="btn btn-small btn-info" href="{{ URL::to('members/' . $member->id . '/edit') }}">Edit this Member</a>
</div>

<div class="col-md-12 view">
    @include('partials.notifications')
    <div class="col-sm-6">
        <p><strong>Name:</strong> {{ $member->first_name }} {{ $member->last_name }}</p>
        <p><strong>Email:</strong> {{ $member->email }}</p>
        <p><strong>Date of Birth:</strong> {{ $member->date_of_birth }}</p>
        <p><strong>Address Line 1:</strong> {{ $member->address_line_1 }}</p>
        <p><strong>Address Line 2:</strong> {{ $member->address_line_2 }}</p>
        <p><strong>Town/City:</strong> {{ $member->town_city }}</p>
        <p><strong>State/County:</strong> {{ $member->state_county }}</p>
        <p><strong>Postcode:</strong> {{ $member->postcode }}</p>
        <p><strong>Country:</strong> {{ SiteHelper::getCountryName($member->country) }}</p>
        <p><strong>Primary Contact Number:</strong> {{ $member->phone_1 }}</p>
        <p><strong>Secondary Contact Number:</strong> {{ $member->phone_2 }}</p>
    </div>
    <div class="col-sm-6">
        <p><strong>Member Type:</strong> {{ $member->membertype->name }}</p>
        <p><strong>Comments:</strong><br /> {{ $member->comments }}</p>
        <p><strong>Purchase Date:</strong> {{ $member->purchase_date }}</p>
        <p><strong>Expiry Date:</strong> {{ $member->expiry_date }}</p>
        <p><strong>Auth Code:</strong> {{ $member->auth_code }}</p>
        <p><strong>Order ID:</strong> {{ $member->order_id }}</p>
        <p><strong>Payment Received:</strong> {{ $member->payement_recieved }}</p>
    </div>
</div>
