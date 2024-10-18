<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system', function(Blueprint $table)
        {
            $table->string('logo');
            $table->integer('mobile');
            $table->string('address');
            $table->string('facebook');
            $table->string('linked_in');
            $table->string('twitter');
            $table->string('google_plus');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
