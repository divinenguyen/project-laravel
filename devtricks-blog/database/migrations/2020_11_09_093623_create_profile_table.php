<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',120);
            $table->string('jobs_form');
            $table->integer('wage_min');
            $table->integer('wage_,max');
            $table->string('career',160);
            $table->string('work_location',120);
            $table->string('foreign_language',250);
            $table->tinyInteger('sex');
            $table->string('matrimony',100);
            $table->text('link_project');
            $table->string('patch_cv');
            $table->text('introduce');
            $table->text('goal');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('profile');
    }
}
