<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupPermissionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return  void
   */
  public function up()
  {
    $permissions = Config::get('constants.permissions');

    // Create table for storing permissions
    Schema::create('permissions', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->string('display_name')->nullable();
      $table->string('description')->nullable();
      $table->timestamps();
    });

    $defaultPermissions = [
      // notices
      array(
        'name' => $permissions['notice']['own']['create'],
        'display_name' => 'Create own notice',
        'description' => 'Can create its own notice',
      ),
      array(
        'name' => $permissions['notice']['own']['read'],
        'display_name' => 'Read own notice',
        'description' => 'Can read its own notice',
      ),
      array(
        'name' => $permissions['notice']['own']['update'],
        'display_name' => 'Update own notice',
        'description' => 'Can update its own notice',
      ),
      array(
        'name' => $permissions['notice']['own']['delete'],
        'display_name' => 'Delete own notice',
        'description' => 'Can delete its own notice',
      ),
      array(
        'name' => $permissions['notice']['own']['publish'],
        'display_name' => 'Publish own notice',
        'description' => 'Can publish its own notice',
      ),
      array(
        'name' => $permissions['notice']['own']['unpublish'],
        'display_name' => 'Unpublish own notice',
        'description' => 'Can unpublish its own notice',
      ),
      array(
        'name' => $permissions['notice']['any']['read'],
        'display_name' => 'Read any notice',
        'description' => 'Can read any notice',
      ),
      array(
        'name' => $permissions['notice']['any']['delete'],
        'display_name' => 'Delete any notice',
        'description' => 'Can delete any notice',
      ),
      array(
        'name' => $permissions['notice']['any']['ban'],
        'display_name' => 'Ban any notice',
        'description' => 'Can ban any notice',
      ),
      array(
        'name' => $permissions['notice']['any']['unban'],
        'display_name' => 'Unban any notice',
        'description' => 'Can unban any notice',
      ),
      array(
        'name' => $permissions['notice']['any']['unpublish'],
        'display_name' => 'Unpublish any notice',
        'description' => 'Can unpublish any notice',
      ),

      // advertisements
      array(
        'name' => $permissions['advertisement']['own']['create'],
        'display_name' => 'Create own advertisement',
        'description' => 'Can create its own advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['own']['read'],
        'display_name' => 'Read own advertisement',
        'description' => 'Can read its own advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['own']['update'],
        'display_name' => 'Update own advertisement',
        'description' => 'Can update its own advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['own']['delete'],
        'display_name' => 'Delete own advertisement',
        'description' => 'Can delete its own advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['own']['publish'],
        'display_name' => 'Publish own advertisement',
        'description' => 'Can publish its own advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['own']['unpublish'],
        'display_name' => 'Unpublish own advertisement',
        'description' => 'Can unpublish its own advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['any']['read'],
        'display_name' => 'Read any advertisement',
        'description' => 'Can read any advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['any']['delete'],
        'display_name' => 'Delete any advertisement',
        'description' => 'Can delete any advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['any']['ban'],
        'display_name' => 'Ban any advertisement',
        'description' => 'Can ban any advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['any']['unban'],
        'display_name' => 'Unban any advertisement',
        'description' => 'Can unban any advertisement',
      ),
      array(
        'name' => $permissions['advertisement']['any']['unpublish'],
        'display_name' => 'Unpublish any advertisement',
        'description' => 'Can unpublish any advertisement',
      ),

      // events
      array(
        'name' => $permissions['event']['own']['create'],
        'display_name' => 'Create own event',
        'description' => 'Can create its own event',
      ),
      array(
        'name' => $permissions['event']['own']['read'],
        'display_name' => 'Read own event',
        'description' => 'Can read its own event',
      ),
      array(
        'name' => $permissions['event']['own']['update'],
        'display_name' => 'Update own event',
        'description' => 'Can update its own event',
      ),
      array(
        'name' => $permissions['event']['own']['delete'],
        'display_name' => 'Delete own event',
        'description' => 'Can delete its own event',
      ),
      array(
        'name' => $permissions['event']['own']['publish'],
        'display_name' => 'Publish own event',
        'description' => 'Can publish its own event',
      ),
      array(
        'name' => $permissions['event']['own']['unpublish'],
        'display_name' => 'Unpublish own event',
        'description' => 'Can unpublish its own event',
      ),
      array(
        'name' => $permissions['event']['any']['read'],
        'display_name' => 'Read any event',
        'description' => 'Can read any event',
      ),

      // alerts
      array(
        'name' => $permissions['alert']['own']['create'],
        'display_name' => 'Create own alert',
        'description' => 'Can create its own alert',
      ),
      array(
        'name' => $permissions['alert']['own']['read'],
        'display_name' => 'Read own alert',
        'description' => 'Can read its own alert',
      ),
      array(
        'name' => $permissions['alert']['own']['update'],
        'display_name' => 'Update own alert',
        'description' => 'Can update its own alert',
      ),
      array(
        'name' => $permissions['alert']['own']['delete'],
        'display_name' => 'Delete own alert',
        'description' => 'Can delete its own alert',
      ),
      array(
        'name' => $permissions['alert']['own']['publish'],
        'display_name' => 'Publish own alert',
        'description' => 'Can publish its own alert',
      ),
      array(
        'name' => $permissions['alert']['own']['unpublish'],
        'display_name' => 'Unpublish own alert',
        'description' => 'Can unpublish its own alert',
      ),
      array(
        'name' => $permissions['alert']['any']['read'],
        'display_name' => 'Read any alert',
        'description' => 'Can read any alert',
      ),

      // users
      array(
        'name' => $permissions['user']['own']['read'],
        'display_name' => 'Read own user',
        'description' => 'Can read itself',
      ),
      array(
        'name' => $permissions['user']['own']['update'],
        'display_name' => 'Update own user',
        'description' => 'Can update itself',
      ),
      array(
        'name' => $permissions['user']['own']['delete'],
        'display_name' => 'Delete own user',
        'description' => 'Can delete itself',
      ),
      array(
        'name' => $permissions['user']['any']['create'],
        'display_name' => 'Create any user',
        'description' => 'Can create any user',
      ),
      array(
        'name' => $permissions['user']['any']['read'],
        'display_name' => 'Read any user',
        'description' => 'Can read any user',
      ),
      array(
        'name' => $permissions['user']['any']['update'],
        'display_name' => 'Update any user',
        'description' => 'Can update any user',
      ),
      array(
        'name' => $permissions['user']['any']['delete'],
        'display_name' => 'Delete any user',
        'description' => 'Can delete any user',
      ),
      array(
        'name' => $permissions['user']['any']['ban'],
        'display_name' => 'Ban any user',
        'description' => 'Can ban any user',
      ),
      array(
        'name' => $permissions['user']['any']['unban'],
        'display_name' => 'Unban any user',
        'description' => 'Can unban any user',
      ),


    ];
    DB::table('permissions')->insert($defaultPermissions);
  }

  /**
   * Reverse the migrations.
   *
   * @return  void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::drop('permissions');
    Schema::enableForeignKeyConstraints();
  }
}
