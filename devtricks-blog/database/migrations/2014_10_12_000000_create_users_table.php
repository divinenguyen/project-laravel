<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->string('fullname',100);
            $table->date('birthday');
            $table->string('address',160);
            $table->integer('phonenumber')->default(0);
            $table->string('avatar',250)->default('xman.jpg');
            $table->string('level',25)->default('data');
            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->boolean('status')->default(false);
            $table->bigInteger('count_post')->default(0);
            $table->bigInteger('views_count')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
