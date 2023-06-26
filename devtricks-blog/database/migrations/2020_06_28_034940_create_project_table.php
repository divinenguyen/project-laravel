<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->string('slug',150);
            $table->string('summary',250);
            $table->string('images',300);
            $table->text('images_list');
            $table->integer('price');
            $table->integer('promotion_price');
            $table->string('link_preview',250);
            $table->string('source_code',100);
            $table->longText('content');
            $table->string('keyword',200);
            $table->string('descriptions',200);
            $table->unsignedInteger('project_type_id');
            $table->foreign('project_type_id')->references('id')->on('project_type');
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
        Schema::dropIfExists('project');
    }
}
