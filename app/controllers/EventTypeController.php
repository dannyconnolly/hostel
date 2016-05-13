<?php

class EventTypeController extends \BaseController {

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
        // get all eventtypes
        $eventtypes = EventType::paginate(20);

        // load view and pass eventtypes
        $this->layout->title = 'Event Types | H Manager';
        $this->layout->main = View::make('eventtypes.index')->with('eventtypes', $eventtypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // load crete form
        $this->layout->title = 'Create Event Type | H Manager';
        $this->layout->main = View::make('eventtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        $rules = array(
            'name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::to('eventtypes/create')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            $eventtype = new EventType;
            $eventtype->name = Input::get('name');
            $eventtype->save();

            // Redirect
            Session::flash('message', 'Successfully created event type');
            return Redirect::to('eventtypes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        // get eventtype
        $eventtype = EventType::find($id);

        // show view and pass eventtype
        $this->layout->title = 'Show Event Type | H Manager';
        $this->layout->main = View::make('eventtypes.show')
                ->with('eventtype', $eventtype);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get eventtype
        $eventtype = EventType::find($id);

        // show view and pass eventtype
        $this->layout->title = 'Edit Event Type | H Manager';
        $this->layout->main = View::make('eventtypes.edit')
                ->with('eventtype', $eventtype);
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
            'name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('eventtypes/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            // store
            $eventtype = EventType::find($id);
            $eventtype->name = Input::get('name');
            $eventtype->save();

            // redirect
            Session::flash('message', 'Successfully updated event type');
            return Redirect::to('eventtypes');
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
        $eventtype = EventType::find($id);
        $eventtype->delete();

        // redirect
        Session::flash('message', 'Successfully deleted event type');
        return Redirect::to('eventtypes');
    }

}
