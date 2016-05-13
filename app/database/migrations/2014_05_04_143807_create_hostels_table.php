<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('hostels', function(Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name', 255);
            $table->string('address_line_1', 255);
            $table->string('address_line_2', 255);
            $table->string('town_city', 255);
            $table->integer('state_county');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('email', 255);
            $table->string('phone', 255);
            $table->string('website', 255);
            $table->text('description');
            $table->string('photo', 255);
            $table->date('open_from');
            $table->date('open_to');
            $table->float('jnr_price');
            $table->float('snr_price');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('hostels', function(Blueprint $table) {
            //
            Schema::drop('hostels');
        });
    }

}
