<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('publishes', function (Blueprint $table) {
      $table->increments('id');
      $table->datetimeTz('scheduled');
      $table->integer('duration');
      $table->morphs('publishable');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('publishes');
    Schema::enableForeignKeyConstraints();
  }
}
