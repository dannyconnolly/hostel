<?php

class UserController extends \BaseController {

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
        // get all users
        $users = User::paginate(20);

        // load view and pass users
        $this->layout->title = 'Users | H Manager';
        $this->layout->main = View::make('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // load crete form
        $roles = Role::lists('name', 'id');

        $this->layout->title = 'Create User | H Manager';
        $this->layout->main = View::make('users.create')->with(array('roles' => $roles));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        $rules = array(
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::to('users/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $user = new User;
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->role_id = Input::get('role_id');
            $user->save();

            // Redirect
            Session::flash('message', 'Successfully created user');
            return Redirect::to('users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        // get user
        $user = User::find($id);

        // show view and pass user
        $this->layout->title = 'Show User | H Manager';
        $this->layout->main = View::make('users.show')
                ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get user
        $user = User::find($id);
        $roles = Role::lists('name', 'id');
        // show view and pass user
        $this->layout->title = 'Edit User | H Manager';
        $this->layout->main = View::make('users.edit')
                ->with(array('roles' => $roles, 'user' => $user));
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
            'username' => 'required',
            'email' => 'required|email',
            'role_id' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('users/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->role_id = Input::get('role_id');
            $user->password = Hash::make(Input::get('password'));
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated user');
            return Redirect::to('users');
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
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted user');
        return Redirect::to('users');
    }

}
