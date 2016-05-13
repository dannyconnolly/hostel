<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CountiesTableSeeder extends Seeder {

    public function run() {
        DB::table('counties')->delete();

        $counties = array(
            array(
                'id' => 1,
                'name' => 'Antrim'
            ),
            array(
                'id' => 2,
                'name' => 'Armagh'
            ),
            array(
                'id' => 3,
                'name' => 'Carlow'
            ),
            array(
                'id' => 4,
                'name' => 'Cavan'
            ),
            array(
                'id' => 5,
                'name' => 'Clare'
            ),
            array(
                'id' => 6,
                'name' => 'Cork'
            ),
            array(
                'id' => 7,
                'name' => 'Derry'
            ),
            array(
                'id' => 8,
                'name' => 'Donegal'
            ),
            array(
                'id' => 9,
                'name' => 'Down'
            ),
            array(
                'id' => 10,
                'name' => 'Dublin'
            ),
            array(
                'id' => 11,
                'name' => 'Fermanagh'
            ),
            array(
                'id' => 12,
                'name' => 'Galway'
            ),
            array(
                'id' => 13,
                'name' => 'Kerry'
            ),
            array(
                'id' => 14,
                'name' => 'Kildare'
            ),
            array(
                'id' => 15,
                'name' => 'Kilkenny'
            ),
            array(
                'id' => 16,
                'name' => 'Laois'
            ),
            array(
                'id' => 17,
                'name' => 'Leitrim'
            ),
            array(
                'id' => 18,
                'name' => 'Limerick'
            ),
            array(
                'id' => 19,
                'name' => 'Longford'
            ),
            array(
                'id' => 20,
                'name' => 'Louth'
            ),
            array(
                'id' => 21,
                'name' => 'Mayo'
            ),
            array(
                'id' => 22,
                'name' => 'Meath'
            ),
            array(
                'id' => 23,
                'name' => 'Monaghan'
            ),
            array(
                'id' => 24,
                'name' => 'Offaly'
            ),
            array(
                'id' => 25,
                'name' => 'Roscommon'
            ),
            array(
                'id' => 26,
                'name' => 'Sligo'
            ),
            array(
                'id' => 27,
                'name' => 'Tipperary'
            ),
            array(
                'id' => 28,
                'name' => 'Tyrone'
            ),
            array(
                'id' => 29,
                'name' => 'Waterford'
            ),
            array(
                'id' => 30,
                'name' => 'Westmeath'
            ),
            array(
                'id' => 31,
                'name' => 'Wexford'
            ),
            array(
                'id' => 32,
                'name' => 'Wicklow'
            )
        );
        DB::table('counties')->insert($counties);
    }

}
