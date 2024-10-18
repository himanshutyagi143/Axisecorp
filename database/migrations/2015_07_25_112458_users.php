<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('role');
            $table->string('phone');
            $table->string('address');
            $table->string('zip');
            $table->string('city');
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $name='admin';
        $email='admin@mail.com';
        $password = Hash::make('admin');
        $role='Administrator';

        DB::table('users')->insert(
            ['name' => $name, 'email' => $email,'password'=>$password,'role'=>$role]
        );



    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
