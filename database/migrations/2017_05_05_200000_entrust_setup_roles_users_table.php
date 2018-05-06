<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use App\User;
use App\Models\Role;

class EntrustSetupRolesUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return  void
   */
  public function up()
  {
    $roles       = Config::get('constants.roles');

    // Create table for associating roles to users (Many-to-Many)
    Schema::create('role_user', function (Blueprint $table) {
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('role_id');

      $table
        ->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table
        ->foreign('role_id')
        ->references('id')
        ->on('roles')
        ->onUpdate('cascade')
        ->onDelete('cascade');

      $table->primary(['user_id', 'role_id']);
    });

    $rolesGet = array(
      $roles['admin']  => Role::where('name', '=', $roles['admin'])->firstOrFail(),
      $roles['board']  => Role::where('name', '=', $roles['board'])->firstOrFail(),
      $roles['owner']  => Role::where('name', '=', $roles['owner'])->firstOrFail(),
      $roles['user']   => Role::where('name', '=', $roles['user'])->firstOrFail(),
      $roles['public'] => Role::where('name', '=', $roles['public'])->firstOrFail(),
    );

    $test0 = User::where('email', '=', 'test0@test.com')->firstOrFail();
    $test1 = User::where('email', '=', 'test1@test.com')->firstOrFail();
    $test2 = User::where('email', '=', 'test2@test.com')->firstOrFail();
    $test3 = User::where('email', '=', 'test3@test.com')->firstOrFail();
    $test4 = User::where('email', '=', 'test4@test.com')->firstOrFail();

    $test0->attachRole($rolesGet[$roles['admin']]);
    $test1->attachRole($rolesGet[$roles['board']]);
    $test2->attachRole($rolesGet[$roles['owner']]);
    $test3->attachRole($rolesGet[$roles['user']]);
    $test4->attachRole($rolesGet[$roles['public']]);
  }

  /**
   * Reverse the migrations.
   *
   * @return  void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::drop('role_user');
    Schema::enableForeignKeyConstraints();
  }
}
