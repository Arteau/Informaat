<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // $table->integer('comment_id')->unsigned();
            // $table->integer('post_id')->unsigned();           
            $table->rememberToken();
            $table->timestamps();
        });
        // Schema::table('users', function(Blueprint $table) {
        //     $table->foreign('comment_id')->references('id')->on('comments');
        //     $table->foreign('post_id')->references('id')->on('posts');
        // });
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
