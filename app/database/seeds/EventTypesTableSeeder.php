<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventTypesTableSeeder extends Seeder {

    public function run() {
        DB::table('event_types')->delete();

        $eventtypes = array(
            array(
                'id' => 1,
                'name' => 'Culture/Music'
            ),
            array(
                'id' => 2,
                'name' => 'Cycling'
            ),
            array(
                'id' => 3,
                'name' => 'Heritage/Nature/History'
            ),
            array(
                'id' => 4,
                'name' => 'Hiking/Hillwalking'
            ),
            array(
                'id' => 5,
                'name' => 'International Event'
            ),
            array(
                'id' => 6,
                'name' => 'Other'
            ),
            array(
                'id' => 7,
                'name' => 'Outdoors Adventure'
            ),
            array(
                'id' => 8,
                'name' => 'Sports Event'
            ),
        );

        DB::table('event_types')->insert($eventtypes);
    }

}
