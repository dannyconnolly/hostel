<div class="page-header">
    <h1>Create a Booking</h1>
    <a href="{{ URL::to('bookings') }}" class="btn btn-info">Bookings</a>
</div>

<div class="col-md-8 col-md-offset-2">
    @include('partials.notifications')

    {{ Form::open(array('url' => 'bookings', 'class' => 'form-horizontal')) }}
    {{ Form::hidden('order_id', time() . mt_rand()) }}
    {{ Form::hidden('price', number_format(Cart::Total(), 2), array('id' => 'price')) }}
    <input type="hidden" value="{{ Input::get('cart_total') }}" name="cart_total" />
    <div class="form-group">
        {{ Form::label('first_name', 'First Name', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last Name', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('date_of_birth', 'Date of Birth', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('date_of_birth', Input::old('date_of_birth'), array('class' => 'form-control date-input')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('address_line_1', 'Address Line 1', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('address_line_1', Input::old('address_line_1'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('address_line_2', 'Address Line 2', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('address_line_2', Input::old('address_line_2'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('town_city', 'Town/City', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('town_city', Input::old('town_city'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('state_county', 'State/County', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('state_county', Input::old('state_county'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('country_id', 'Country', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::select('country_id', $countries, Input::old('country_id'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('post_code', 'Post Code', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('post_code', Input::old('post_code'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone_1', 'Phone 1', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('phone_1', Input::old('phone_1'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone_2', 'Phone 1', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::text('phone_2', Input::old('phone_2'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('snr_male_guests', 'Snr Male Guests', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('number', 'snr_male_guests', Input::old('snr_male_guests'), array('class' => 'form-control', 'min' => '1', 'max' => '20')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('snr_female_guests', 'Snr Female Guests', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('number', 'snr_female_guests', Input::old('snr_female_guests'), array('class' => 'form-control', 'min' => '1', 'max' => '20')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('jr_male_guests', 'Jr Male Guests', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('number', 'jr_male_guests', Input::old('jr_male_guests'), array('class' => 'form-control', 'min' => '1', 'max' => '20')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('jr_female_guests', 'Jr Female Guests', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('number', 'jr_female_guests', Input::old('jr_female_guests'), array('class' => 'form-control', 'min' => '1', 'max' => '20')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('comments', 'Any Additional Comments?', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::textarea('comments', Input::old('comments'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <script>
                var price = document.getElementById('price');
            </script>
            <script
                src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
                data-key="pk_test_j0p8qXRAWrtz3hbWvvjIMkjx"
                data-amount="{{Input::get('cart_total') * 100}}"
                data-name="H Manager"
                data-description="Quadcopter"
                data-image="{{url('img/stripe-128x128.png')}}">
            </script>
        </div>
    </div>

    {{ Form::close() }}

</div>