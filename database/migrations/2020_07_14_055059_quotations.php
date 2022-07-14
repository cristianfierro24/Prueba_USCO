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
            $table->date('date_quotations');
            $table->unsignedBigInteger('persons_id');
            $table->unsignedBigInteger('offices_id');
            $table->unsignedBigInteger('doctors_id');
            
            $table->timestamps();

            $table->foreign('persons_id')->references('id')->on('users');
            $table->foreign('offices_id')->references('id')->on('offices');
            $table->foreign('doctors_id')->references('id')->on('users');

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
