<div class="col-md-10">
    <h1>Create a BookingItem</h1>
</div>
<div class="col-md-2">
    <a href="{{ URL::to('bookingitems') }}" class="btn btn-info">BookingItems</a>
</div>

<div class="col-md-12">

    @include('partials.notifications')

    {{ Form::open(array('url' => 'bookingitems', 'class' => 'form-horizontal')) }}
    <div class="form-group">

        <div class="col-sm-10">

        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit('Create the BookingItem!', array('class' => 'btn btn-primary')) }}
        </div>
    </div>

    {{ Form::close() }}

</div>