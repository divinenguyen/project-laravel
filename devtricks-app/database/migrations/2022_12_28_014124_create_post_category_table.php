<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('slug',100)->unique();
            $table->integer('parent_id');
            $table->string('keyword',200);
            $table->string('description',200);
            $table->string('image',250);
            $table->integer('ordering');
            $table->tinyInteger('is_active');
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
        Schema::dropIfExists('post_category');
    }
}
