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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productCode')->unique();
            $table->string('name');
            $table->string('origin');
            $table->string('manufacturer');
            $table->bigInteger('brandId')->unsigned();
            $table->bigInteger('itemId')->unsigned();
            $table->integer('quantity');
            $table->text('description');
            $table->foreign('brandId')->references('id')->on('brands');
            $table->foreign('itemId')->references('id')->on('product_item');
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
        Schema::dropIfExists('products');
    }
};
