<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $defaultUsers = [
          array(
            'name' => 'Aix-en-Provence',
            'email' => 'test1@test.com',
            'password' => bcrypt('111111'),
          ),
          array(
            'name' => 'Commerce',
            'email' => 'test2@test.com',
            'password' => bcrypt('222222'),
          ),
        ];
        DB::table('users')->insert($defaultUsers);
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
