<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

       
    Schema::create('coords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lat');
            $table->string('ing');
            $table->string('coment');
            $table->string('name');
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
        Schema::dropIfExists('coords.php');
        Schema::table('coords', function ($table) {
            $table->increments('id')->primary()->nullable(false)->change();
         });
        
        //
    }
}
