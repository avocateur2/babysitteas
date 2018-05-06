<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('notices', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->string('text');
      $table->timestamps();

      $table->unsignedInteger('user_id');
      $table
        ->foreign('user_id')
        ->references('id')
        ->on('users');
    });

    $noticeDefault = [
      array(
        'title' => 'Cours de danse',
        'text' => "Tiphaine, à l'insu de son plein gré, vous propose des cours de danse pour relâcher la pression",
        'user_id' => 4,
      ),
      array(
        'title' => 'Cours OpenClassroom',
        'text' => "Recherche cours d'Open Class Rooms pour apprendre language de base tel que le html, css, python et c++",
        'user_id' => 4,
      ),
      array(
        'title' => 'ON VEUT DE LA VIANDE',
        'text' => "J'ai faim,J'ai faim,J'ai faim,J'ai faim,J'ai faim,J'ai faim,J'ai faim,J'ai faim,J'ai faim,J'ai faim,",
        'user_id' => 4,
      ),
    ];
    DB::table('notices')->insert($noticeDefault);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::enableForeignKeyConstraints();
    Schema::dropIfExists('notices');
  }
}
