<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->text('content');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news');
            $table->integer('like');
            $table->integer('unlike');
            $table->boolean('status');
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
        Schema::dropIfExists('comment');
    }
}
