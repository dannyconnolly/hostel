<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuthController extends BaseController {

    public function post_login() {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $input = Input::get();
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::to('login')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        }
        if (Auth::attempt(
                        array(
                            'email' => Input::get('email'),
                            'password' => Input::get('password')
                        )
                )) {
            Session::flash('message', 'Successfully Logged in');
            return Redirect::to('users');
        } else {

            Session::flash('message', 'Invalid username or password');
            return Redirect::to('login');
        }
    }

    public function get_login() {
        $this->layout->title = 'Login | H Manager';
        $this->layout->main = View::make('auth.login');
    }

    public function logout() {
        Auth::logout();
        Session::flash('message', 'Successfully logged out');
        return Redirect::to('/');
    }

}
