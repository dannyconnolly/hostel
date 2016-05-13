<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('members', function(Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->date('date_of_birth');
            $table->string('email', 255);
            $table->string('address_line_1', 255);
            $table->string('address_line_2', 255)->nullable();
            $table->string('town_city', 255);
            $table->string('state_county', 255);
            $table->string('postcode', 10);
            $table->integer('country');
            $table->string('phone_1', 32);
            $table->string('phone_2', 32);
            $table->integer('membertype_id');
            $table->text('comments');
            $table->date('purchase_date');
            $table->date('expiry_date')->nullable();
            $table->string('auth_code', 32)->nullable();
            $table->string('order_id', 255)->nullable();
            $table->float('payement_recieved')->nullable();
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
        Schema::drop('members');
    }

}
