<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_detail', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('from_user')->unsigned()->default(0);
          $table->foreign('from_user')->references('id')->on('users')->onDelete('cascade');
          $table->string('rank');
          $table->string('position');
          $table->string('department');

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
        Schema::dropIfExists('user_detail');
    }
}
