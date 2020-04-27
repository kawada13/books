<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folder_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('title', 100);
            $table->string('comment');
            $table->integer('status')->default(1);
            $table->timestamps();

            // 外部キー
            $table->foreign('folder_id')->references('id')->on('folders');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
