<?php

class PageController extends \BaseController {
    /*
      |--------------------------------------------------------------------------
      | Page Controller
      |--------------------------------------------------------------------------
      |
      | Front End Views for Hostels and Events
      |
      |
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function getHostelListings() {

        $hostels = Hostel::lists('name', 'id');
        $hostellistings = Hostel::paginate(10);

        $this->layout->title = 'Hostel Listings';
        $this->layout->main = View::make('pages.hostels')->with(array('hostels' => $hostels, 'hostellistings' => $hostellistings));
    }

    public function getEventListings() {

        //$events = Event::paginate(20)->orderBy('when', 'desc');
        $events = DB::table('events')->orderBy('when', 'desc')->paginate(10);

        $this->layout->title = 'Event Listings';
        $this->layout->main = View::make('pages.events')->with(array('events' => $events));
    }

}
