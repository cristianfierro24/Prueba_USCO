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
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date_init_quotations');
            $table->dateTime('date_end_quotations');
            $table->string('justification');
            $table->integer('status');//0 pendiente, 1 finalizada, 2 cancelada, 3 no asistio.
            $table->unsignedBigInteger('users_id')->unsigned()->nullable();
            $table->unsignedBigInteger('offices_id')->unsigned()->nullable();
            $table->unsignedBigInteger('doctors_id')->unsigned()->nullable();
            $table->unsignedBigInteger('pacients_id')->unsigned()->nullable();
            
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('offices_id')->references('id')->on('offices');
            $table->foreign('doctors_id')->references('id')->on('users');
            $table->foreign('pacients_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
