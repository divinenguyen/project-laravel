?<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      /*
       * id
          name
          slug
          summary
          image
          content
          keyword
          view_count
          is_active
          is_featured
          created_at
          updated_at
          created_by
          updated_by

      */
        Schema::create('post_news', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('slug',150)->unique();
            $table->string('summary',250);
            $table->string('image',300);
            $table->longText('content');
            $table->string('keyword',150);
            $table->integer('view_count');
            $table->tinyInteger('is_active');
            $table->tinyInteger('is_featured');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('post_news');
    }
}
