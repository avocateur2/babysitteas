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
      // Admin
      array(
        'name' => 'Publicityz',
        'email' => 'test0@test.com',
        'password' => bcrypt('000000'),
      ),
      // Board
      array(
        'name' => 'Board ' . uniqid(),
        'email' => 'test1@test.com',
        'password' => bcrypt('111111'),
      ),
      // Owner
      array(
        'name' => 'The Camp',
        'email' => 'test2@test.com',
        'password' => bcrypt('222222'),
      ),
      // User
      array(
        'name' => 'Veggie Bar',
        'email' => 'test3@test.com',
        'password' => bcrypt('333333'),
      ),
      // Public
      array(
        'name' => 'Tiffaine SWAM',
        'email' => 'test4@test.com',
        'password' => bcrypt('444444'),
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
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('users');
    Schema::enableForeignKeyConstraints();
  }
}
