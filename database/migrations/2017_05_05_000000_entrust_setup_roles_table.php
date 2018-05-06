<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupRolesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return  void
   */
  public function up()
  {
    $roles       = Config::get('constants.roles');

    // Create table for storing roles
    Schema::create('roles', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->string('display_name')->nullable();
      $table->string('description')->nullable();
      $table->timestamps();
    });

    $defaultRoles = [
      array(
        'name' => $roles['admin'],
        'display_name' => 'Admin',
        'description' => 'Product admin',
      ),
      array(
        'name' => $roles['board'],
        'display_name' => 'Board',
        'description' => 'Product',
      ),
      array(
        'name' => $roles['owner'],
        'display_name' => 'Owner',
        'description' => 'Product owner',
      ),
      array(
        'name' => $roles['user'],
        'display_name' => 'User',
        'description' => 'Product user',
      ),
      array(
        'name' => $roles['public'],
        'display_name' => 'Public',
        'description' => 'Product public',
      ),
    ];
    DB::table('roles')->insert($defaultRoles);
  }

  /**
   * Reverse the migrations.
   *
   * @return  void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::drop('roles');
    Schema::enableForeignKeyConstraints();
  }
}
