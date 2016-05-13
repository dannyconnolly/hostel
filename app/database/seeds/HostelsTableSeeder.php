<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HostelsTableSeeder extends Seeder {

    public function run() {
        $count = 45;

        $this->command->info('Deleting existing hostels table ...');
        DB::table('hostels')->delete();

        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Base($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));
        $faker->addProvider(new Faker\Provider\Address($faker));
        $faker->addProvider(new Faker\Provider\PhoneNumber($faker));
        $faker->addProvider(new Faker\Provider\Company($faker));

        $this->command->info('Inserting ' . $count . ' sample records using Faker ...');
        // $faker->seed(1234);

        for ($x = 0; $x < $count; $x++) {
            Hostel::create(array(
                'name' => $faker->company,
                'address_line_1' => $faker->streetAddress,
                'address_line_2' => $faker->secondaryAddress,
                'town_city' => $faker->city,
                'state_county' => $faker->randomNumber(1, 32),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'email' => $faker->email,
                'phone' => $faker->PhoneNumber,
                'website' => $faker->url,
                'description' => $faker->text,
                'photo' => 'uploads/image1.jpg',
                'open_from' => $faker->date(),
                'open_to' => $faker->date(),
                'jnr_price' => $faker->randomFloat(2, 10, 90),
                'snr_price' => $faker->randomFloat(2, 10, 90)
            ));
        }

        $this->command->info('Hostels table seeded using Faker ...');
    }

}
