<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Event extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    public function eventtype() {
        return $this->belongsTo('EventType');
    }

    public function hostel() {
        return $this->belongsTo('Hostel');
    }

}
