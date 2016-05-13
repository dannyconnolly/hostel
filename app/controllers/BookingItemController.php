<?php

class BookingItemController extends \BaseController {

    public function __construct() {
        $this->beforeFilter('auth');
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $bookingitems = BookingItem::paginate(20);

        $this->layout->title = 'Booking Items | H Manager';
        $this->layout->main = View::make('bookingitems.index')->with('bookingitems', $bookingitems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $this->layout->title = 'Create Booking Item | H Manager';
        $this->layout->main = View::make('bookingitems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        $rules = array(
            'booking_id' => 'required|numeric',
            'hostel_id' => 'required|numeric',
            'arrival_date' => 'required|date',
            'nights_stay' => 'required|numeric',
            'total_guests' => 'required|numeric',
            'snr_male_guests' => 'numeric',
            'snr_female_guests' => 'numeric',
            'jr_male_guests' => 'numeric',
            'jr_female_guests' => 'numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::to('bookingitems/create')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            $bookingitem = new BookingItem();
            $bookingitem->booking_id = Input::get('booking_id');
            $bookingitem->hostel_id = Input::get('hostel_id');
            $bookingitem->arrival_date = Input::get('arrival_date');
            $bookingitem->nights_stay = Input::get('nights_stay');
            $bookingitem->total_guests = Input::get('total_guests');
            $bookingitem->snr_male_guests = Input::get('snr_male_guests');
            $bookingitem->snr_female_guests = Input::get('snr_female_guests');
            $bookingitem->jr_male_guests = Input::get('jr_male_guests');
            $bookingitem->jr_female_guests = Input::get('jr_female_guests');
            $bookingitem->save();

            // Redirect
            Session::flash('message', 'Successfully created bookingitem');
            return Redirect::to('bookingitems');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        // get bookingitem
        $bookingitem = BookingItem::find($id);

        // show view and pass bookingitem
        $this->layout->title = 'Show BookingItem | H Manager';
        $this->layout->main = View::make('bookingitems.show')
                ->with(array('bookingitem' => $bookingitem));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get bookingitem
        $bookingitem = BookingItem::find($id);

        // show view and pass bookingitem
        $this->layout->title = 'Edit BookingItem | H Manager';
        $this->layout->main = View::make('bookingitems.edit')
                ->with(array('bookingitem' => $bookingitem));
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
            'booking_id' => 'required|numeric',
            'hostel_id' => 'required|numeric',
            'arrival_date' => 'required|date',
            'nights_stay' => 'required|numeric',
            'total_guests' => 'required|numeric',
            'snr_male_guests' => 'numeric',
            'snr_female_guests' => 'numeric',
            'jr_male_guests' => 'numeric',
            'jr_female_guests' => 'numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('bookingitems/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            // store
            $bookingitem = BookingItem::find($id);
            $bookingitem->booking_id = Input::get('booking_id');
            $bookingitem->hostel_id = Input::get('hostel_id');
            $bookingitem->arrival_date = Input::get('arrival_date');
            $bookingitem->nights_stay = Input::get('nights_stay');
            $bookingitem->total_guests = Input::get('total_guests');
            $bookingitem->snr_male_guests = Input::get('snr_male_guests');
            $bookingitem->snr_female_guests = Input::get('snr_female_guests');
            $bookingitem->jr_male_guests = Input::get('jr_male_guests');
            $bookingitem->jr_female_guests = Input::get('jr_female_guests');
            $bookingitem->save();

            // redirect
            Session::flash('message', 'Successfully updated bookingitem');
            return Redirect::to('bookingitems');
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
        $bookingitem = BookingItem::find($id);
        $bookingitem->delete();

        // redirect
        Session::flash('message', 'Successfully deleted bookingitem');
        return Redirect::to('bookingitems');
    }

}
