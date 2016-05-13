<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('eventtype_id');
            $table->string('address_line_1', 255);
            $table->string('address_line_2', 255);
            $table->string('town_city', 255);
            $table->string('state_county', 255);
            $table->string('latitude', 255);
            $table->string('longitude', 255);
            $table->string('email', 255);
            $table->string('phone', 255);
            $table->string('url', 255);
            $table->dateTime('when');
            $table->text('details');
            $table->float('cost');
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
        Schema::drop('events');
    }

}
