<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventsTableSeeder extends Seeder {

    public function run() {
        $count = 175;

        $this->command->info('Deleting existing users table ...');
        DB::table('events')->delete();

        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Base($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\DateTime($faker));
        $faker->addProvider(new Faker\Provider\Company($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));
        $faker->addProvider(new Faker\Provider\PhoneNumber($faker));

        $this->command->info('Inserting ' . $count . ' sample records using Faker ...');
        // $faker->seed(1234);


        for ($x = 0; $x < $count; $x++) {
            $random_month = rand(1, 12);
            $random_month = $random_month < 10 ? '0' . $random_month : $random_month;

            $random_day = rand(1, 28);
            $random_day = $random_day < 10 ? '0' . $random_day : $random_day;

            Event::create(array(
                'title' => $faker->catchPhrase(),
                'eventtype_id' => $faker->randomNumber(1, 8),
                'address_line_1' => $faker->streetName(),
                'address_line_2' => $faker->secondaryAddress(),
                'town_city' => $faker->city(),
                'state_county' => $faker->state(),
                'latitude' => $faker->latitude(),
                'longitude' => $faker->longitude(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'url' => $faker->url(),
                'details' => $faker->paragraph(30),
                'cost' => round($faker->randomFloat(2, 10, 90), 2),
                'when' => '2014-' . $random_month . '-' . $random_day . ' ' . rand(12, 23) . ':30:30'
            ));
        }

        $this->command->info('Events table seeded using Faker ...');
    }

}
