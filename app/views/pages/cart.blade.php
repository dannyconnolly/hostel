<div class="page-header">
    <h1>Cart</h1>
</div>
<div class="col-md-12">

    @include('partials.notifications')

    @if ($basket == 0)
    <p>There are currently no items in your cart</p>
    @else
    <?php $item_totals = array(); ?>
    {{ Form::open(array('route' => 'checkout', 'method' => 'post')) }}
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Hostel</th>
                <th>No. Nights</th>
                <th>Cost Per Night</th>
                <th>No. Guests</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($cart as $value)
            <tr>
                <td>
                    {{ $value->name }}
                </td>
                <td>
                    {{ Form::html5_field('number', 'quantity', $value->quantity, array('class' => 'form-control', 'min' => '1', 'max' => '20')) }}
                </td>
                <td>
                    &euro;{{ number_format($value->price, 2) }}
                </td>
                <td>
                    @if ($value->hasOptions())
                    {{ Form::html5_field('number', 'total_guests', $value->options['total_guests'], array('class' => 'form-control', 'min' => '1', 'max' => '20')) }}
                    @endif
                </td>
                <td>
                    &euro;{{ $subtotal = SiteHelper::calculateItemTotal($value->price, $value->quantity, $value->options['total_guests']) }}
                </td>
                <td>
                    <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    <a href="/cart/removeitem/{{ $value->identifier }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">{{ Cart::totalItems(true);}}</td>
                <td colspan="2">
                    <?php $item_totals[] = SiteHelper::calculateItemTotal($value->price, $value->quantity, $value->options['total_guests']); ?>
                    <strong>Total:</strong> &euro; {{ array_sum($item_totals) }}
                    <input type="hidden" value="{{ array_sum($item_totals) }}" name="cart_total" />
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <a class="btn btn-small btn-success" href="{{ URL::to('/') }}">View more hostels</a>                    
                </td>
                <td colspan="2">
                    {{ Form::submit('Update Cart', array('class' => 'btn btn-info', 'name' => 'update_cart')) }}
                    {{ Form::submit('Proceed to checkout', array('class' => 'btn btn-success', 'name' => 'checkout')) }}
                </td>
            </tr>
        </tbody>
    </table>
    {{ Form::close() }}
    @endif
</div>