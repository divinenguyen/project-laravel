<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag_news', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('post_id');
          $table->foreign('post_id')->references('id')->on('post_news');
          $table->unsignedBigInteger('tag_id');
          $table->foreign('tag_id')->references('id')->on('post_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag_news');
    }
}
