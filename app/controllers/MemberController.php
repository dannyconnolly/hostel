<?php

class MemberController extends \BaseController {

    public function __construct() {
        $this->beforeFilter('auth', array('except' => 'create'));
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        // get all members
        $members = Member::with('membertype')->paginate(20);

        // load view and pass members
        $this->layout->title = 'Members | H Manager';
        $this->layout->main = View::make('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // load crete form

        $countries = Country::lists('name', 'id');
        $membertypes = MemberType::lists('name', 'id');
        $this->layout->title = 'Create Member | H Manager';
        $this->layout->main = View::make('members.create')->with(array('membertypes' => $membertypes, 'countries' => $countries));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required|email',
            'address_line_1' => 'required',
            'town_city' => 'required',
            'state_county' => 'required',
            'country' => 'required|numeric',
            'phone_1' => 'required',
            'membertype_id' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::to('members/create')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            $member = new Member;
            $member->first_name = Input::get('first_name');
            $member->last_name = Input::get('last_name');
            $member->date_of_birth = Input::get('date_of_birth');
            $member->email = Input::get('email');
            $member->address_line_1 = Input::get('address_line_1');
            $member->address_line_2 = Input::get('address_line_2');
            $member->town_city = Input::get('town_city');
            $member->state_county = Input::get('state_county');
            $member->postcode = Input::get('postcode');
            $member->country = Input::get('country');
            $member->phone_1 = Input::get('phone_1');
            $member->phone_2 = Input::get('phone_2');
            $member->membertype_id = Input::get('membertype_id');
            $member->comments = Input::get('comments');
            $member->purchase_date = date('Y-m-d');
            $member->expiry_date = date('Y-m-d');
            $member->save();

            // Redirect
            Session::flash('message', 'Successfully created member');
            return Redirect::to('members');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        // get member
        $member = Member::with('membertype')->find($id);

        // show view and pass member
        $this->layout->title = 'Show Member | H Manager';
        $this->layout->main = View::make('members.show')
                ->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get member
        $member = Member::find($id);

        // show view and pass member
        $countries = Country::lists('name', 'id');
        $membertypes = MemberType::lists('name', 'id');
        $this->layout->title = 'Edit Member | H Manager';
        $this->layout->main = View::make('members.edit')
                ->with(array('membertypes' => $membertypes, 'countries' => $countries, 'member' => $member));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required|email',
            'address_line_1' => 'required',
            'town_city' => 'required',
            'state_county' => 'required',
            'country' => 'required|numeric',
            'phone_1' => 'required',
            'membertype_id' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('members/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            // store
            $member = Member::find($id);
            $member->first_name = Input::get('first_name');
            $member->last_name = Input::get('last_name');
            $member->date_of_birth = Input::get('date_of_birth');
            $member->email = Input::get('email');
            $member->address_line_1 = Input::get('address_line_1');
            $member->address_line_2 = Input::get('address_line_2');
            $member->town_city = Input::get('town_city');
            $member->state_county = Input::get('state_county');
            $member->postcode = Input::get('postcode');
            $member->country = Input::get('country');
            $member->phone_1 = Input::get('phone_1');
            $member->phone_2 = Input::get('phone_2');
            $member->membertype_id = Input::get('membertype_id');
            $member->comments = Input::get('comments');
            $member->purchase_date = date('Y-m-d');
            $member->expiry_date = date('Y-m-d');
            $member->save();

            // redirect
            Session::flash('message', 'Successfully updated member');
            return Redirect::to('members/' . $id);
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
        $member = Member::find($id);
        $member->delete();

        // redirect
        Session::flash('message', 'Successfully deleted member');
        return Redirect::to('members');
    }

}
