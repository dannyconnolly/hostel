<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();


        $this->call('CountriesTableSeeder');
        $this->command->info('Countries table seeded!');
        $this->call('RolesTableSeeder');
        $this->command->info('Roles table seeded!');
        $this->call('CountiesTableSeeder');
        $this->command->info('Counties table seeded!');
        $this->call('UsersTableSeeder');
        $this->command->info('Users table seeded!');
        $this->call('MembersTableSeeder');
        $this->command->info('Members table seeded!');
        $this->call('EventsTableSeeder');
        $this->command->info('Events table seeded!');
        $this->call('HostelsTableSeeder');
        $this->command->info('Hostels table seeded!');
        $this->call('MemberTypesTableSeeder');
        $this->command->info('Member Types table seeded!');
        $this->call('EventTypesTableSeeder');
        $this->command->info('Event Types table seeded!');
    }

}
