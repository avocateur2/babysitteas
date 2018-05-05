<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use App\Models\Role;
use App\Models\Permission;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

        $defaultRoles = [
          array(
            'name' => 'OWNER',
            'display_name' => 'Owner',
            'description' => 'Product owner',
          ),
          array(
            'name' => 'BOARD',
            'display_name' => 'Board',
            'description' => 'Product',
          ),
          array(
            'name' => 'USER',
            'display_name' => 'User',
            'description' => 'Product user',
          ),
          array(
            'name' => 'PUBLIC',
            'display_name' => 'Public',
            'description' => 'Product public',
          ),
        ];
        DB::table('roles')->insert($defaultRoles);

        $defaultPermissions = [
          // notice
          array(
            'name' => 'create_own_notice',
            'display_name' => 'Create own notice',
            'description' => 'Can create its own notice',
          ),
          array(
            'name' => 'read_own_notice',
            'display_name' => 'Read own notice',
            'description' => 'Can read its own notice',
          ),
          array(
            'name' => 'update_own_notice',
            'display_name' => 'Update own notice',
            'description' => 'Can update its own notice',
          ),
          array(
            'name' => 'delete_own_notice',
            'display_name' => 'Delete own notice',
            'description' => 'Can delete its own notice',
          ),
          array(
            'name' => 'publish_own_notice',
            'display_name' => 'Publish own notice',
            'description' => 'Can publish its own notice',
          ),
          array(
            'name' => 'unpublish_own_notice',
            'display_name' => 'Unpublish own notice',
            'description' => 'Can unpublish its own notice',
          ),
          array(
            'name' => 'read_any_notice',
            'display_name' => 'Read any notice',
            'description' => 'Can read any notice',
          ),
          array(
            'name' => 'delete_any_notice',
            'display_name' => 'Delete any notice',
            'description' => 'Can delete any notice',
          ),
          array(
            'name' => 'ban_any_notice',
            'display_name' => 'Ban any notice',
            'description' => 'Can ban any notice',
          ),
          array(
            'name' => 'unban_any_notice',
            'display_name' => 'Unban any notice',
            'description' => 'Can unban any notice',
          ),
          array(
            'name' => 'publish_any_notice',
            'display_name' => 'Publish any notice',
            'description' => 'Can publish any notice',
          ),
          array(
            'name' => 'unpublish_any_notice',
            'display_name' => 'Unpublish any notice',
            'description' => 'Can unpublish anynotice',
          ),

          // advertisement
          array(
            'name' => 'create_own_advertismeent',
            'display_name' => 'Create own advertisement',
            'description' => 'Can create its own advertisement',
          ),
          array(
            'name' => 'read_own_advertisement',
            'display_name' => 'Read own advertisement',
            'description' => 'Can read its own advertisement',
          ),
          array(
            'name' => 'update_own_advertisement',
            'display_name' => 'Update own advertisement',
            'description' => 'Can update its own advertisement',
          ),
          array(
            'name' => 'delete_own_advertisement',
            'display_name' => 'Delete own advertisement',
            'description' => 'Can delete its own advertisements',
          ),
          array(
            'name' => 'publish_own_advertisement',
            'display_name' => 'Publish own advertisement',
            'description' => 'Can publish its own advertisement',
          ),
          array(
            'name' => 'unpublish_own_advertisement',
            'display_name' => 'Unpublish own advertisement',
            'description' => 'Can unpublish its own advertisement',
          ),
          array(
            'name' => 'read_any_advertismeent',
            'display_name' => 'Read any advertisement',
            'description' => 'Can read any advertisement',
          ),
          array(
            'name' => 'delete_any_advertisement',
            'display_name' => 'Delete any advertisement',
            'description' => 'Can delete any advertisement',
          ),
          array(
            'name' => 'ban_any_advertisement',
            'display_name' => 'Ban any advertisement',
            'description' => 'Can ban any advertisement',
          ),
          array(
            'name' => 'unban_any_advertisement',
            'display_name' => 'Unban any advertisement',
            'description' => 'Can unban any advertisements',
          ),
          array(
            'name' => 'publish_any_advertisement',
            'display_name' => 'Publish any advertisement',
            'description' => 'Can publish any advertisement',
          ),
          array(
            'name' => 'unpublish_any_advertisement',
            'display_name' => 'Unpublish any advertisement',
            'description' => 'Can unpublish any advertisement',
          ),

          // event
          array(
            'name' => 'create_own_event',
            'display_name' => 'Create own event',
            'description' => 'Can create its own event'
          ),
          array(
            'name' => 'read_own_event',
            'display_name' => 'Read own event',
            'description' => 'Can read its own event'
          ),
          array(
            'name' => 'update_own_event',
            'display_name' => 'Update own event',
            'description' => 'Can update its own event'
          ),
          array(
            'name' => 'delete_own_event',
            'display_name' => 'Delete own event',
            'description' => 'Can delete its own event'
          ),
          array(
            'name' => 'publish_own_event',
            'display_name' => 'Publish own event',
            'description' => 'Can publish its own event'
          ),
          array(
            'name' => 'unpublish_own_event',
            'display_name' => 'Unpublish own event',
            'description' => 'Can unpublish its own event'
          ),
          array(
            'name' => 'read_any_event',
            'display_name' => 'Read any event',
            'description' => 'Can read any event'
          ),
          array(
            'name' => 'delete_any_event',
            'display_name' => 'Delete any event',
            'description' => 'Can delete any event'
          ),
          array(
            'name' => 'ban_any_event',
            'display_name' => 'Ban any event',
            'description' => 'Can ban any event'
          ),
          array(
            'name' => 'unban_any_event',
            'display_name' => 'Unban any event',
            'description' => 'Can unban any event'
          ),
          array(
            'name' => 'publish_any_event',
            'display_name' => 'Publish any event',
            'description' => 'Can publish any event'
          ),
          array(
            'name' => 'unpublish_any_event',
            'display_name' => 'Unpublish any event',
            'description' => 'Can unpublish anyevent'
          ),

          // alert
          array(
            'name' => 'create_alert',
            'display_name' => 'Create alert',
            'description' => 'Can create an alert'
          ),
          array(
            'name' => 'read_alert',
            'display_name' => 'Read alert',
            'description' => 'Can read an alert'
          ),
          array(
            'name' => 'update_alert',
            'display_name' => 'Update alert',
            'description' => 'Can update an alert'
          ),
          array(
            'name' => 'delete_alert',
            'display_name' => 'Delete alert',
            'description' => 'Can delete an alert'
          ),
          array(
            'name' => 'publish_alert',
            'display_name' => 'Publish alert',
            'description' => 'Can publish an alert'
          ),
          array(
            'name' => 'unpublish_alert',
            'display_name' => 'Unpublish alert',
            'description' => 'Can unpublish an alert'
          ),

          // user
          array(
            'name' => 'create_user',
            'display_name' => 'Create User',
            'description' => 'Can create an User'
          ),
          array(
            'name' => 'read_user',
            'display_name' => 'Read User',
            'description' => 'Can read an User'
          ),
          array(
            'name' => 'update_user',
            'display_name' => 'Update User',
            'description' => 'Can update an User'
          ),
          array(
            'name' => 'delete_user',
            'display_name' => 'Delete User',
            'description' => 'Can delete an User'
          ),
        ];
        DB::table('permissions')->insert($defaultPermissions);

        $owner  = Role::where('name', '=', 'OWNER')->firstOrFail();
        $board  = Role::where('name', '=', 'BOARD')->firstOrFail();
        $user   = Role::where('name', '=', 'USER')->firstOrFail();
        $public = Role::where('name', '=', 'PUBLIC')->firstOrFail();


        $permissions = array(
          'create_own_notice'           => Permission::where('name', '=','create_own_notice')->firstOrFail(),
          'read_own_notice'             => Permission::where('name', '=','read_own_notice')->firstOrFail(),
          'update_own_notice'           => Permission::where('name', '=','update_own_notice')->firstOrFail(),
          'delete_own_notice'           => Permission::where('name', '=','delete_own_notice')->firstOrFail(),
          'publish_own_notice'          => Permission::where('name', '=','publish_own_notice')->firstOrFail(),
          'unpublish_own_notice'        => Permission::where('name', '=','unpublish_own_notice')->firstOrFail(),
          'read_any_notice'             => Permission::where('name', '=','read_any_notice')->firstOrFail(),
          'delete_any_notice'           => Permission::where('name', '=','delete_any_notice')->firstOrFail(),
          'ban_any_notice'              => Permission::where('name', '=','ban_any_notice')->firstOrFail(),
          'unban_any_notice'            => Permission::where('name', '=','unban_any_notice')->firstOrFail(),
          'publish_any_notice'          => Permission::where('name', '=','publish_any_notice')->firstOrFail(),
          'unpublish_any_notice'        => Permission::where('name', '=','unpublish_any_notice')->firstOrFail(),
          'create_own_advertisement'    => Permission::where('name', '=','create_own_advertismeent')->firstOrFail(),
          'read_own_advertisement'      => Permission::where('name', '=','read_own_advertisement')->firstOrFail(),
          'update_own_advertisement'    => Permission::where('name', '=','update_own_advertisement')->firstOrFail(),
          'delete_own_advertisement'    => Permission::where('name', '=','delete_own_advertisement')->firstOrFail(),
          'publish_own_advertisement'   => Permission::where('name', '=','publish_own_advertisement')->firstOrFail(),
          'unpublish_own_advertisement' => Permission::where('name', '=','unpublish_own_advertisement')->firstOrFail(),
          'read_any_advertisement'      => Permission::where('name', '=','read_any_advertismeent')->firstOrFail(),
          'delete_any_advertisement'    => Permission::where('name', '=','delete_any_advertisement')->firstOrFail(),
          'ban_any_advertisement'       => Permission::where('name', '=','ban_any_advertisement')->firstOrFail(),
          'unban_any_advertisement'     => Permission::where('name', '=','unban_any_advertisement')->firstOrFail(),
          'publish_any_advertisement'   => Permission::where('name', '=','publish_any_advertisement')->firstOrFail(),
          'unpublish_any_advertisement' => Permission::where('name', '=','unpublish_any_advertisement')->firstOrFail(),
          'create_own_event'            => Permission::where('name', '=','create_own_event')->firstOrFail(),
          'read_own_event'              => Permission::where('name', '=','read_own_event')->firstOrFail(),
          'create_own_event'            => Permission::where('name', '=','create_own_event')->firstOrFail(),
          'update_own_event'            => Permission::where('name', '=','update_own_event')->firstOrFail(),
          'delete_own_event'            => Permission::where('name', '=','delete_own_event')->firstOrFail(),
          'publish_own_event'           => Permission::where('name', '=','publish_own_event')->firstOrFail(),
          'unpublish_own_event'         => Permission::where('name', '=','unpublish_own_event')->firstOrFail(),
          'read_any_event'              => Permission::where('name', '=','read_any_event')->firstOrFail(),
          'delete_any_event'            => Permission::where('name', '=','delete_any_event')->firstOrFail(),
          'ban_any_event'               => Permission::where('name', '=','ban_any_event')->firstOrFail(),
          'unban_any_event'             => Permission::where('name', '=','unban_any_event')->firstOrFail(),
          'publish_any_event'           => Permission::where('name', '=','publish_any_event')->firstOrFail(),
          'unpublish_any_event'         => Permission::where('name', '=','unpublish_any_event')->firstOrFail(),
          'create_alert'                => Permission::where('name', '=','create_alert')->firstOrFail(),
          'read_alert'                  => Permission::where('name', '=','read_alert')->firstOrFail(),
          'update_alert'                => Permission::where('name', '=','update_alert')->firstOrFail(),
          'delete_alert'                => Permission::where('name', '=','delete_alert')->firstOrFail(),
          'publish_alert'               => Permission::where('name', '=','publish_alert')->firstOrFail(),
          'unpublish_alert'             => Permission::where('name', '=','unpublish_alert')->firstOrFail(),
          'create_user'                 => Permission::where('name', '=','create_user')->firstOrFail(),
          'read_user'                   => Permission::where('name', '=','read_user')->firstOrFail(),
          'update_user'                 => Permission::where('name', '=','update_user')->firstOrFail(),
          'delete_user'                 => Permission::where('name', '=','delete_user')->firstOrFail(),
        );

        // public
      $public->attachPermission($permissions['create_own_notice']); //notice
      $public->attachPermission($permissions['publish_own_notice']);

        // user
      $user->attachPermission($permissions['create_own_notice']); //notice
      $user->attachPermission($permissions['publish_own_notice']);
      $user->attachPermission($permissions['create_own_advertisement']); //advertisement
      $user->attachPermission($permissions['read_own_advertisement']);
      $user->attachPermission($permissions['update_own_advertisement']);
      $user->attachPermission($permissions['delete_own_advertisement']);
      $user->attachPermission($permissions['publish_own_advertisement']);

      // Owner
      $owner->attachPermission($permissions['create_own_notice']); //notice
      $owner->attachPermission($permissions['publish_own_notice']);
      $owner->attachPermission($permissions['create_own_advertisement']); //advertisement
      $owner->attachPermission($permissions['read_own_advertisement']);
      $owner->attachPermission($permissions['update_own_advertisement']);
      $owner->attachPermission($permissions['delete_own_advertisement']);
      $owner->attachPermission($permissions['publish_own_advertisement']);
      $owner->attachPermission($permissions['read_any_notice']); //notice
      $owner->attachPermission($permissions['delete_any_notice']);
      $owner->attachPermission($permissions['unpublish_any_notice']);
      $owner->attachPermission($permissions['read_any_advertisement']); //advertisement
      $owner->attachPermission($permissions['delete_any_advertisement']);
      $owner->attachPermission($permissions['ban_any_advertisement']);
      $owner->attachPermission($permissions['unban_any_advertisement']);
      $owner->attachPermission($permissions['unpublish_any_advertisement']);
      $owner->attachPermission($permissions['create_own_event']); //event
      $owner->attachPermission($permissions['read_own_event']);
      $owner->attachPermission($permissions['update_own_event']);
      $owner->attachPermission($permissions['delete_own_event']);
      $owner->attachPermission($permissions['publish_own_event']);
      $owner->attachPermission($permissions['read_any_event']);
      $owner->attachPermission($permissions['delete_any_event']);
      $owner->attachPermission($permissions['ban_any_event']);
      $owner->attachPermission($permissions['unban_any_event']);
      $owner->attachPermission($permissions['unpublish_any_event']);
      $owner->attachPermission($permissions['create_alert']); //alert
      $owner->attachPermission($permissions['read_alert']);
      $owner->attachPermission($permissions['update_alert']);
      $owner->attachPermission($permissions['delete_alert']);
      $owner->attachPermission($permissions['publish_alert']);
      $owner->attachPermission($permissions['unpublish_alert']);
      $owner->attachPermission($permissions['create_user']); //user
      $owner->attachPermission($permissions['read_user']);
      $owner->attachPermission($permissions['update_user']);
      $owner->attachPermission($permissions['delete_user']);

      $board->attachPermission($permissions['read_any_notice']);
      $board->attachPermission($permissions['read_any_advertisement']);
      $board->attachPermission($permissions['read_any_event']);
      $board->attachPermission($permissions['read_alert']);
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
