<?php

class MemberTypeController extends \BaseController {

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
        // get all membertypes
        $membertypes = MemberType::paginate(20);

        // load view and pass membertypes
        $this->layout->title = 'Member Types | H Manager';
        $this->layout->main = View::make('membertypes.index')->with('membertypes', $membertypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // load crete form
        $this->layout->title = 'Create Member Type | H Manager';
        $this->layout->main = View::make('membertypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::to('membertypes/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $membertype = new MemberType;
            $membertype->name = Input::get('name');
            $membertype->description = Input::get('description');
            $membertype->cost = Input::get('cost');
            $membertype->save();

            // Redirect
            Session::flash('message', 'Successfully created membertype');
            return Redirect::to('membertypes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        // get membertype
        $membertype = MemberType::find($id);

        // show view and pass membertype
        $this->layout->title = 'Show MemberType | H Manager';
        $this->layout->main = View::make('membertypes.show')
                ->with('membertype', $membertype);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get membertype
        $membertype = MemberType::find($id);

        // show view and pass membertype
        $this->layout->title = 'Edit MemberType | H Manager';
        $this->layout->main = View::make('membertypes.edit')
                ->with('membertype', $membertype);
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
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('membertypes/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            // store
            $membertype = MemberType::find($id);
            $membertype->name = Input::get('name');
            $membertype->description = Input::get('description');
            $membertype->cost = Input::get('cost');
            $membertype->save();

            // redirect
            Session::flash('message', 'Successfully updated membertype');
            return Redirect::to('membertypes');
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
        $membertype = MemberType::find($id);
        $membertype->delete();

        // redirect
        Session::flash('message', 'Successfully deleted membertype');
        return Redirect::to('membertypes');
    }

}
