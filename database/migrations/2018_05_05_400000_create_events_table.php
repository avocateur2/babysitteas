<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('events', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('datestart');
      $table->string('dateend');
      $table->string('price');
      $table->string('url');
      $table->timestamps();

      $table->unsignedInteger('user_id');
      $table
        ->foreign('user_id')
        ->references('id')
        ->on('users');
    });

    $eventDefault = [
      array(
        'name' => 'Parc de la Rose',
        'datestart' => '19h',
        'dateend' => '02h',
        'price' => 'GRATUIT',
        'url' => '/img/evt1.jpg',
        'user_id' => 2,
      ),
      array(
        'name' => "Flâneries d'Art Comtemporain",
        'datestart' => '14h',
        'dateend' => '08h',
        'price' => 'GRATUIT',
        'url' => '/img/evt2.jpg',
        'user_id' => 2,
      ),
    ];
    DB::table('events')->insert($eventDefault);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('events');
    Schema::enableForeignKeyConstraints();
  }
}
