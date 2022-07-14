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
        Schema::create('diagnostics_medications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quantity');
            $table->unsignedBigInteger('medications_id');
            $table->unsignedBigInteger('diagnostics_id');
            
            $table->timestamps();

            $table->foreign('medications_id')->references('id')->on('medications');
            $table->foreign('diagnostics_id')->references('id')->on('diagnostics');

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
