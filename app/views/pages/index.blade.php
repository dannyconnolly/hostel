<div class="page-header">
    <h1 class="">H Manager</h1>
</div>
@include('partials.notifications')

<div class="col-md-7">
    {{ Form::open(array('url' => 'cart', 'class' => 'form-horizontal' , 'name' => 'booking_form')) }}

    <div class="form-group">
        {{ Form::label('hostel_id', 'Hostel', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::select('hostel_id', $hostels, Input::old('hostel_id'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('arrival_date', 'Arrival Date', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::html5_field( 'date', 'arrival_date', Input::old('arrival_date'), array('class' => 'form-control')) }}
                <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('nights_stay', 'Nights stay', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('number', 'nights_stay', Input::old('nights_stay'), array('class' => 'form-control', 'min' => '1', 'max' => '20')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('total_guests', 'No. of guest', array('class' => "col-sm-4")) }}
        <div class="col-sm-8">
            {{ Form::html5_field('number', 'total_guests', Input::old('total_guests'), array('class' => 'form-control', 'min' => '1', 'max' => '20')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            {{ Form::submit('Add to cart', array('class' => 'btn btn-success')) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
