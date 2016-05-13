<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersTableSeeder extends Seeder {

    public function run() {

        $count = 5;

        $this->command->info('Deleting existing users table ...');
        DB::table('users')->delete();

        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Base($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));

        $this->command->info('Inserting ' . $count . ' sample records using Faker ...');

        User::create(array(
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'remember_token' => 0,
            'role_id' => 1
        ));
        // $faker->seed(1234);

        for ($x = 0; $x < $count; $x++) {
            User::create(array(
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make($faker->word),
                'remember_token' => $faker->randomNumber(0, 1),
                'role_id' => $faker->randomNumber(1, 3)
            ));
        }

        $this->command->info('Users table seeded using Faker ...');
    }

}
