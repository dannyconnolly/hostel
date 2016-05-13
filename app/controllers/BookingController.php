<?php

class BookingController extends \BaseController {

    public function __construct() {
        //$this->beforeFilter('auth');
        //$this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $bookings = Booking::paginate(20);

        $this->layout->title = 'Bookings | H Manager';
        $this->layout->main = View::make('bookings.index')->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $countries = Country::lists('name', 'id');
        $membertypes = MemberType::lists('name', 'id');
        $this->layout->title = 'Create Booking | H Manager';
        $this->layout->main = View::make('bookings.create')->with(array('countries' => $countries, 'membertypes' => $membertypes));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        $rules = array(
            'order_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'date',
            'address_line_1' => 'required',
            'town_city' => 'required',
            'state_county' => 'required',
            'country_id' => 'required|numeric',
            'phone_1' => 'required',
            'snr_male_guests' => 'numeric',
            'snr_female_guests' => 'numeric',
            'jr_male_guests' => 'numeric',
            'jr_female_guests' => 'numeric',
        );

        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::to('bookings/create')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            // Set up Stripe private api key
            Stripe::setApiKey('sk_test_P9JEMGOEUFQQnaPI7REueKxG');

            // Get the credit card details submitted by the form
            $token = Input::get('stripeToken');

            // Create the charge on Stripe's servers - this will charge the user's card
            try {
                $t = Input::get('cart_total');
                $amount = $t * 100;
                $charge = Stripe_Charge::create(array(
                            "amount" => $amount,
                            "currency" => "usd",
                            "card" => $token,
                            "description" => 'Charge for my product')
                );
            } catch (Stripe_CardError $e) {
                $e_json = $e->getJsonBody();
                $error = $e_json['error'];
                // The card has been declined
                // redirect back to checkout page

                return Redirect::to('checkout')
                                ->with_input()
                                ->with(array('card_errors' => $error));
            }

            foreach (Cart::contents() as $item) {
                $item_array = $item->toArray();
                $item_options = $item_array['options'];
                $bookingitem = new BookingItem();
                $bookingitem->order_id = Input::get('order_id');
                $bookingitem->hostel_id = $item->id;
                $bookingitem->arrival_date = $item_options['arrival_date'];
                $bookingitem->nights_stay = $item->quantity;
                $bookingitem->total_guests = $item_options['total_guests'];
                $bookingitem->save();
            }

            $booking = new Booking();
            $booking->order_id = Input::get('order_id');
            $booking->total_amount = Input::get('cart_total');
            $booking->booking_date = date("Y-m-d");
            $booking->first_name = Input::get('first_name');
            $booking->last_name = Input::get('last_name');
            $booking->email = Input::get('email');
            $booking->date_of_birth = Input::get('date_of_birth');
            $booking->address_line_1 = Input::get('address_line_1');
            $booking->address_line_2 = Input::get('address_line_2');
            $booking->town_city = Input::get('town_city');
            $booking->state_county = Input::get('state_county');
            $booking->country_id = Input::get('country_id');
            $booking->post_code = Input::get('post_code');
            $booking->phone_1 = Input::get('phone_1');
            $booking->phone_2 = Input::get('phone_2');
            $booking->comments = Input::get('comments');
            $booking->snr_male_guests = Input::get('snr_male_guests');
            $booking->snr_female_guests = Input::get('snr_female_guests');
            $booking->jr_male_guests = Input::get('jr_male_guests');
            $booking->jr_female_guests = Input::get('jr_female_guests');
            $booking->status = 0;
            $booking->save();

            Cart::destroy();
            // Redirect
            Session::flash('message', 'Successfully created booking');
            return Redirect::to('bookings');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        // get booking
        $booking = Booking::find($id);
        $bookingitems = BookingItem::where('order_id', '=', $booking->order_id)->get();

        // show view and pass booking
        $this->layout->title = 'Show Booking | H Manager';
        $this->layout->main = View::make('bookings.show')
                ->with(array('booking' => $booking, 'bookingitems' => $bookingitems));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get booking
        $booking = Booking::find($id);
        $countries = Country::lists('name', 'id');
        $membertypes = MemberType::lists('name', 'id');
        // show view and pass booking
        $this->layout->title = 'Edit Booking | H Manager';
        $this->layout->main = View::make('bookings.edit')
                ->with(array('booking' => $booking, 'countries' => $countries, 'membertypes' => $membertypes));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        // validate
        $rules = array(
            'order_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'date',
            'address_line_1' => 'required',
            'town_city' => 'required',
            'state_county' => 'required',
            'country_id' => 'required|numeric',
            'phone_1' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('bookings/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            // store
            $booking = Booking::find($id);
            $booking->order_id = Input::get('order_id');
            $booking->total_amount = Input::get('cart_total');
            $booking->booking_date = date("Y-m-d");
            $booking->first_name = Input::get('first_name');
            $booking->last_name = Input::get('last_name');
            $booking->email = Input::get('email');
            $booking->date_of_birth = Input::get('date_of_birth');
            $booking->address_line_1 = Input::get('address_line_1');
            $booking->address_line_2 = Input::get('address_line_2');
            $booking->town_city = Input::get('town_city');
            $booking->state_county = Input::get('state_county');
            $booking->country_id = Input::get('country_id');
            $booking->post_code = Input::get('post_code');
            $booking->phone_1 = Input::get('phone_1');
            $booking->phone_2 = Input::get('phone_2');
            $booking->comments = Input::get('comments');
            $booking->snr_male_guests = Input::get('snr_male_guests');
            $booking->snr_female_guests = Input::get('snr_female_guests');
            $booking->jr_male_guests = Input::get('jr_male_guests');
            $booking->jr_female_guests = Input::get('jr_female_guests');
            $booking->status = Input::get('status');
            $booking->save();

            // redirect
            Session::flash('message', 'Successfully updated booking');
            return Redirect::to('bookings');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        // delete
        $booking = Booking::find($id);
        $booking->delete();

        // redirect
        Session::flash('message', 'Successfully deleted booking');
        return Redirect::to('bookings');
    }

}
