<?php

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function index() {

        $hostels = Hostel::lists('name', 'id');

        $this->layout->title = 'Home | H Manager';
        $this->layout->main = View::make('pages.index')->with(array('hostels' => $hostels));
    }

}
