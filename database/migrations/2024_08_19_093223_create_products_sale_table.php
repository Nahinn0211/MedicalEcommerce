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
        Schema::create('products_sale', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('saleId')->unsigned();
            $table->bigInteger('productId')->unsigned();
            $table->foreign('saleId')->references('id')->on('sales');
            $table->foreign('productId')->references('id')->on('products');
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
        Schema::dropIfExists('products_sale');
    }
};
