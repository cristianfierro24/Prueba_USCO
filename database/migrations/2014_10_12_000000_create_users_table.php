<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('last_names');
            $table->string('address');
            $table->string('phone');
            $table->decimal('salary');
            $table->decimal('taxes');            
            $table->unsignedBigInteger('profiles_id');
            $table->unsignedBigInteger('municipalities_id');
            $table->unsignedBigInteger('departaments_id');

            $table->rememberToken();
            $table->timestamps();

           // $table->foreign('profiles_id')->references('id')->on('profiles');
            $table->foreign('municipalities_id')->references('id')->on('municipalities');
            $table->foreign('departaments_id')->references('id')->on('departaments');
            
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
};
