<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoryNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category_news', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('post_id');
          $table->foreign('post_id')->references('id')->on('post_news');
          $table->unsignedBigInteger('category_id');
          $table->foreign('category_id')->references('id')->on('post_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_category_news');
    }
}
