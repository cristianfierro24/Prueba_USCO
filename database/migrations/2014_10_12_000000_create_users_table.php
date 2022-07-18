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
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('document_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('last_names')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('salary')->nullable();
            $table->decimal('taxes')->nullable(); 
           
            $table->unsignedBigInteger('document_types_id')->unsigned()->nullable();  
            $table->unsignedBigInteger('profiles_id')->unsigned()->nullable();
            $table->unsignedBigInteger('municipalities_id')->unsigned()->nullable();
            $table->unsignedBigInteger('departaments_id')->unsigned()->nullable();

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('document_types_id')->references('id')->on('document_types');
            $table->foreign('profiles_id')->references('id')->on('profiles');
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
