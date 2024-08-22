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
        Schema::create('reviews_blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('blogId')->unsigned();
            $table->tinyInteger('rating');
            $table->text('comment');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('blogId')->references('id')->on('blogs');
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
        Schema::dropIfExists('reviews_blogs');
    }
};
