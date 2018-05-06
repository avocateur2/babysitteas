<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('advertisements', function (Blueprint $table) {
      $table->increments('id');
      $table->string('url');
      $table->timestamps();

      $table->unsignedInteger('shop_id');
      $table
        ->foreign('shop_id')
        ->references('id')
        ->on('shops');
    });

    $defaultAdv = [
      array(
        'url' => 'img/adv1.jpg',
        'shop_id' => 1,
      ),
      array(
        'url' => 'img/adv2.jpg',
        'shop_id' => 2,
      ),
    ];
    DB::table('advertisements')->insert($defaultAdv);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('advertisements');
    Schema::enableForeignKeyConstraints();
  }
}
