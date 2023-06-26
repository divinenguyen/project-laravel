<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('skill_fontend');
            $table->text('skill_backend');
            $table->text('skill_database');
            $table->text('skill_language');
            $table->text('skill_soft');
            $table->text('skill_other');
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
        Schema::dropIfExists('skill');
    }
}
