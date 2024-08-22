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
        Schema::create('reviews_doctors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('doctorId')->unsigned();
            $table->tinyInteger('rating');
            $table->text('comment');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('doctorId')->references('id')->on('doctors');
            $table->tinyInteger('row_delete')->default(0);
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
        Schema::dropIfExists('reviews_doctors');
    }
};
