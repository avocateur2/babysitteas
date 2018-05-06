<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('shops', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('address');
      $table->string('hours');
      $table->integer('rating');
      $table->timestamps();

      $table->unsignedInteger('user_id');
      $table
        ->foreign('user_id')
        ->references('id')
        ->on('users');
    });

    $defaultShops = [
      array(
        'name' => 'Daurade Land',
        'address' => 'La Rotonde|13100 Aix-en-Provence',
        'hours' => 'Mardi-Jeudi|8h-19h',
        'rating' => 2,
        'user_id' => 3,
      ),
      array(
        'name'=>'O Délice des Fruits',
        'address' => '127 Rue de la République|13100 Aix-en-Porvence',
        'hours' => 'Lundi-Samedi|9h-18h',
        'rating' => 4,
        'user_id' => 3,
      ),
    ];
    DB::table('shops')->insert($defaultShops);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('shops');
    Schema::enableForeignKeyConstraints();
  }
}
