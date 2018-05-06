<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('alerts', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('text');
      $table->string('url');
      $table->timestamps();

      $table->unsignedInteger('user_id');
      $table
        ->foreign('user_id')
        ->references('id')
        ->on('users');
    });

    $alertDefault = [
      array(
        'name' => 'Alerte enlèvement',
        'text' => "Le sommeil a disparu. Si vous avez quelques informations que ce soit, merci de nous les communiquer",
        'url' => '/img/alt1.jpg',
        'user_id' => 2,
      ),
    ];
    DB::table('alerts')->insert($alertDefault);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('alerts');
    Schema::enableForeignKeyConstraints();
  }
}
