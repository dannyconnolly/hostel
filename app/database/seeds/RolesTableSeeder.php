<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RolesTableSeeder extends Seeder {

    public function run() {
        DB::table('roles')->delete();

        $roles = array(
            array(
                'id' => 1,
                'name' => 'dev-admin',
                'permissions' => ''
            ),
            array(
                'id' => 2,
                'name' => 'admin',
                'permissions' => ''
            ),
            array(
                'id' => 3,
                'name' => 'editor',
                'permissions' => ''
            ),
        );

        DB::table('roles')->insert($roles);
    }

}
