<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJeugdhuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeugdhuis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('village');
            $table->string('zipcode');
            $table->integer('points')->nullable();
            $table->softDeletes();            
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
        Schema::dropIfExists('jeugdhuis');
    }
}
