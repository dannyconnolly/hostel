<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MemberType extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'member_types';

    public function members() {
        return $this->hasMany('Member');
    }

}
