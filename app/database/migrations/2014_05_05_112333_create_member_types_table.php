<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('member_types', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description');
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
        Schema::drop('member_types');
    }

}
