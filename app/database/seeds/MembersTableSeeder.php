<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MembersTableSeeder extends Seeder {

    public function run() {
        $count = 175;

        $this->command->info('Deleting existing members table ...');
        DB::table('members')->delete();

        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Base($faker));
        $faker->addProvider(new Faker\Provider\Person($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));
        $faker->addProvider(new Faker\Provider\PhoneNumber($faker));
        $faker->addProvider(new Faker\Provider\Address($faker));
        $faker->addProvider(new Faker\Provider\DateTime($faker));

        $this->command->info('Inserting ' . $count . ' sample records using Faker ...');
        // $faker->seed(1234);

        for ($x = 0; $x < $count; $x++) {
            Member::create(array(
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date(),
                'email' => $faker->email,
                'address_line_1' => $faker->streetAddress,
                'address_line_2' => $faker->secondaryAddress,
                'town_city' => $faker->city,
                'state_county' => $faker->state,
                'postcode' => $faker->postcode,
                'country' => $faker->randomNumber(1, 200),
                'phone_1' => $faker->phoneNumber,
                'phone_2' => $faker->phoneNumber,
                'membertype_id' => 1,
                'purchase_date' => $faker->date(),
                'expiry_date' => $faker->date(),
                'comments' => $faker->paragraph(10)
            ));
        }

        $this->command->info('members table seeded using Faker ...');
    }

}
