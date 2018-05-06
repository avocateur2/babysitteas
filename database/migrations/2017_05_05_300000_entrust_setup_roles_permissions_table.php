<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use App\Models\Role;
use App\Models\Permission;

class EntrustSetupRolesPermissionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return  void
   */
  public function up()
  {
    $roles       = Config::get('constants.roles');
    $permissions = Config::get('constants.permissions');

    // Create table for associating permissions to roles (Many-to-Many)
    Schema::create('permission_role', function (Blueprint $table) {
      $table->unsignedInteger('permission_id');
      $table->unsignedInteger('role_id');

      $table
        ->foreign('permission_id')
        ->references('id')
        ->on('permissions')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table
        ->foreign('role_id')
        ->references('id')
        ->on('roles')
        ->onUpdate('cascade')
        ->onDelete('cascade');

      $table->primary(['permission_id', 'role_id']);
    });

    $rolesGet = array(
      $roles['admin']  => Role::where('name', '=', $roles['admin'])->firstOrFail(),
      $roles['board']  => Role::where('name', '=', $roles['board'])->firstOrFail(),
      $roles['owner']  => Role::where('name', '=', $roles['owner'])->firstOrFail(),
      $roles['user']   => Role::where('name', '=', $roles['user'])->firstOrFail(),
      $roles['public'] => Role::where('name', '=', $roles['public'])->firstOrFail(),
    );

    $permissionsGet = array(
      $permissions['notice']['own']['create']    => Permission::where('name', '=', $permissions['notice']['own']['create'])->firstOrFail(),
      $permissions['notice']['own']['read']      => Permission::where('name', '=', $permissions['notice']['own']['read'])->firstOrFail(),
      $permissions['notice']['own']['update']    => Permission::where('name', '=', $permissions['notice']['own']['update'])->firstOrFail(),
      $permissions['notice']['own']['delete']    => Permission::where('name', '=', $permissions['notice']['own']['delete'])->firstOrFail(),
      $permissions['notice']['own']['publish']   => Permission::where('name', '=', $permissions['notice']['own']['publish'])->firstOrFail(),
      $permissions['notice']['own']['unpublish'] => Permission::where('name', '=', $permissions['notice']['own']['unpublish'])->firstOrFail(),
      $permissions['notice']['any']['read']      => Permission::where('name', '=', $permissions['notice']['any']['read'])->firstOrFail(),
      $permissions['notice']['any']['delete']    => Permission::where('name', '=', $permissions['notice']['any']['delete'])->firstOrFail(),
      $permissions['notice']['any']['ban']       => Permission::where('name', '=', $permissions['notice']['any']['ban'])->firstOrFail(),
      $permissions['notice']['any']['unban']     => Permission::where('name', '=', $permissions['notice']['any']['unban'])->firstOrFail(),
      $permissions['notice']['any']['unpublish'] => Permission::where('name', '=', $permissions['notice']['any']['unpublish'])->firstOrFail(),
      $permissions['advertisement']['own']['create']    => Permission::where('name', '=', $permissions['advertisement']['own']['create'])->firstOrFail(),
      $permissions['advertisement']['own']['read']      => Permission::where('name', '=', $permissions['advertisement']['own']['read'])->firstOrFail(),
      $permissions['advertisement']['own']['update']    => Permission::where('name', '=', $permissions['advertisement']['own']['update'] )->firstOrFail(),
      $permissions['advertisement']['own']['delete']    => Permission::where('name', '=', $permissions['advertisement']['own']['delete'])->firstOrFail(),
      $permissions['advertisement']['own']['publish']   => Permission::where('name', '=', $permissions['advertisement']['own']['publish'])->firstOrFail(),
      $permissions['advertisement']['own']['unpublish'] => Permission::where('name', '=', $permissions['advertisement']['own']['unpublish'])->firstOrFail(),
      $permissions['advertisement']['any']['read']      => Permission::where('name', '=', $permissions['advertisement']['any']['read'])->firstOrFail(),
      $permissions['advertisement']['any']['delete']    => Permission::where('name', '=', $permissions['advertisement']['any']['delete'])->firstOrFail(),
      $permissions['advertisement']['any']['ban']       => Permission::where('name', '=', $permissions['advertisement']['any']['ban'])->firstOrFail(),
      $permissions['advertisement']['any']['unban']     => Permission::where('name', '=', $permissions['advertisement']['any']['unban'])->firstOrFail(),
      $permissions['advertisement']['any']['unpublish'] => Permission::where('name', '=', $permissions['advertisement']['any']['unpublish'])->firstOrFail(),
      $permissions['event']['own']['create']    => Permission::where('name', '=', $permissions['event']['own']['create'])->firstOrFail(),
      $permissions['event']['own']['read']      => Permission::where('name', '=', $permissions['event']['own']['read'])->firstOrFail(),
      $permissions['event']['own']['update']    => Permission::where('name', '=', $permissions['event']['own']['update'])->firstOrFail(),
      $permissions['event']['own']['delete']    => Permission::where('name', '=', $permissions['event']['own']['delete'])->firstOrFail(),
      $permissions['event']['own']['publish']   => Permission::where('name', '=', $permissions['event']['own']['publish'])->firstOrFail(),
      $permissions['event']['own']['unpublish'] => Permission::where('name', '=', $permissions['event']['own']['unpublish'])->firstOrFail(),
      $permissions['event']['any']['read']      => Permission::where('name', '=', $permissions['event']['any']['read'])->firstOrFail(),
      $permissions['alert']['own']['create']    => Permission::where('name', '=', $permissions['alert']['own']['create'])->firstOrFail(),
      $permissions['alert']['own']['read']      => Permission::where('name', '=', $permissions['alert']['own']['read'])->firstOrFail(),
      $permissions['alert']['own']['update']    => Permission::where('name', '=', $permissions['alert']['own']['update'])->firstOrFail(),
      $permissions['alert']['own']['delete']    => Permission::where('name', '=', $permissions['alert']['own']['delete'])->firstOrFail(),
      $permissions['alert']['own']['publish']   => Permission::where('name', '=', $permissions['alert']['own']['publish'])->firstOrFail(),
      $permissions['alert']['own']['unpublish'] => Permission::where('name', '=', $permissions['alert']['own']['unpublish'])->firstOrFail(),
      $permissions['alert']['any']['read']      => Permission::where('name', '=', $permissions['alert']['any']['read'])->firstOrFail(),
      $permissions['user']['own']['read']       => Permission::where('name', '=', $permissions['user']['own']['read'])->firstOrFail(),
      $permissions['user']['own']['update'] => Permission::where('name', '=', $permissions['user']['own']['update'])->firstOrFail(),
      $permissions['user']['own']['delete'] => Permission::where('name', '=', $permissions['user']['own']['delete'])->firstOrFail(),
      $permissions['user']['any']['create'] => Permission::where('name', '=', $permissions['user']['any']['create'])->firstOrFail(),
      $permissions['user']['any']['read']   => Permission::where('name', '=', $permissions['user']['any']['read'])->firstOrFail(),
      $permissions['user']['any']['update'] => Permission::where('name', '=', $permissions['user']['any']['update'])->firstOrFail(),
      $permissions['user']['any']['delete'] => Permission::where('name', '=', $permissions['user']['any']['delete'])->firstOrFail(),
      $permissions['user']['any']['ban']    => Permission::where('name', '=', $permissions['user']['any']['ban'])->firstOrFail(),
      $permissions['user']['any']['unban']  => Permission::where('name', '=', $permissions['user']['any']['unban'])->firstOrFail(),
    );

    // Public11
    $rolesGet[$roles['public']]->attachPermission($permissionsGet[$permissions['notice']['own']['create']]);           //notice
    $rolesGet[$roles['public']]->attachPermission($permissionsGet[$permissions['notice']['own']['read']]);
    $rolesGet[$roles['public']]->attachPermission($permissionsGet[$permissions['notice']['own']['update']]);
    $rolesGet[$roles['public']]->attachPermission($permissionsGet[$permissions['notice']['own']['delete']]);
    $rolesGet[$roles['public']]->attachPermission($permissionsGet[$permissions['notice']['own']['publish']]);
    $rolesGet[$roles['public']]->attachPermission($permissionsGet[$permissions['notice']['own']['unpublish']]);

    // User
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['advertisement']['own']['create']]);      //advertisement
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['advertisement']['own']['read']]);
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['advertisement']['own']['update']]);
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['advertisement']['own']['delete']]);
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['advertisement']['own']['publish']]);
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['advertisement']['own']['unpublish']]);
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['user']['own']['read']]);                 //user
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['user']['own']['update']]);
    $rolesGet[$roles['user']]->attachPermission($permissionsGet[$permissions['user']['own']['delete']]);

    // Owner
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['notice']['any']['read']]);              //notice
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['notice']['any']['delete']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['notice']['any']['ban']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['notice']['any']['unban']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['advertisement']['any']['read']]);       //advertisement
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['advertisement']['any']['delete']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['advertisement']['any']['ban']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['advertisement']['any']['unban']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['advertisement']['any']['unpublish']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['event']['own']['create']]);             //event
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['event']['own']['read']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['event']['own']['update']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['event']['own']['delete']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['event']['own']['publish']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['event']['own']['unpublish']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['alert']['own']['create']]);             //alert
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['alert']['own']['read']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['alert']['own']['update']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['alert']['own']['delete']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['alert']['own']['publish']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['alert']['own']['unpublish']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['user']['any']['create']]);               //user
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['user']['any']['read']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['user']['any']['update']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['user']['any']['delete']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['user']['any']['ban']]);
    $rolesGet[$roles['owner']]->attachPermission($permissionsGet[$permissions['user']['any']['unban']]);

    // Board
    $rolesGet[$roles['board']]->attachPermission($permissionsGet[$permissions['notice']['any']['read']]);              //notice
    $rolesGet[$roles['board']]->attachPermission($permissionsGet[$permissions['advertisement']['any']['read']]);       //advertisement
    $rolesGet[$roles['board']]->attachPermission($permissionsGet[$permissions['event']['any']['read']]);               //event
    $rolesGet[$roles['board']]->attachPermission($permissionsGet[$permissions['alert']['any']['read']]);               //alert

    // Owner
    $rolesGet[$roles['admin']]->attachPermission($permissionsGet[$permissions['notice']['any']['read']]);              //notice
    $rolesGet[$roles['admin']]->attachPermission($permissionsGet[$permissions['advertisement']['any']['read']]);       //advertisement
    $rolesGet[$roles['admin']]->attachPermission($permissionsGet[$permissions['event']['any']['read']]);               //event
    $rolesGet[$roles['admin']]->attachPermission($permissionsGet[$permissions['alert']['any']['read']]);               //alert
    $rolesGet[$roles['admin']]->attachPermission($permissionsGet[$permissions['user']['any']['read']]);                //user
  }

  /**
   * Reverse the migrations.
   *
   * @return  void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::drop('permission_role');
    Schema::enableForeignKeyConstraints();
  }
}
