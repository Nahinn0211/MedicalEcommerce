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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctorId')->unsigned();
            $table->bigInteger('userId')->unsigned();
            $table->dateTime('appointment_date');
            $table->enum('status', ['SCHEDULED', 'COMPLETED', 'CANCELED'])->default('SCHEDULED');
            $table->tinyInteger('row_delete')->default(0);
            $table->foreign('doctorId')->references('id')->on('doctors');
            $table->foreign('userId')->references('id')->on('users');
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
        Schema::dropIfExists('appointments');
    }
};
