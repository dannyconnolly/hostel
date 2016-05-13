<div class="page-header">
    <h1 class="">Hostels</h1>
</div>

<div class="col-md-12">

    @include('partials.notifications')

    <ul class="hostel-list-group">
        @foreach($hostellistings as $key => $value)
        <li class="listing">
            <div class="media">
                <div class="pull-left">
                    <a href="{{ URL::to('hostels/' . $value->id) }}">
                        <img class="media-object" data-src="holder.js/150x100" alt="150x100" src="http://placehold.it/150x100">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        <a href="{{ URL::to('hostels/' . $value->id) }}">{{ $value->name }}</a>
                    </h4>
                    <p>{{ $value->town_city }}</p>
                    <p>
                        <strong>Open between: </strong>
                        <small>{{ date("M", strtotime($value->open_from)) }} - {{ date("M", strtotime($value->open_to)) }}</small>
                    </p>
                    <button class="btn btn-success btn-block book-btn" data-hostel="{{ $value->id }}">Book</button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>

    {{ $hostellistings->links() }}
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    {{ Form::open(array('url' => 'cart', 'class' => 'form-horizontal' , 'name' => 'booking_form')) }}
    {{ Form::hidden('hostel_id', null, array('class' => 'hidden_hostel'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Book Hostel</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::label('hostel_id', 'Hostel', array('class' => "col-sm-4")) }}
                    <div class="col-sm-8">
                        {{ Form::select('hostel_id', $hostels, Input::old('hostel_name'), array('class' => 'form-control hostel_name')) }}
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
            </div>
            <div class="modal-footer">
                {{ Form::submit('Book Now!', array('class' => 'btn btn-success')) }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    {{ Form::close() }}
</div><!-- /.modal -->
