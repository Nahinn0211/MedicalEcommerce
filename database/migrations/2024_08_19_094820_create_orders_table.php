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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderCode');
            $table->bigInteger('userId')->unsigned();
            $table->decimal('total_amount',10,2);
            $table->string('shipping_address');
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->enum('order_status', ['PENDING','PROCESSING','SHIPPED','COMPLETED','CANCELED']);
            $table->string('coupon_code');
            $table->decimal('discount_amount',10,2);
            $table->decimal('shipping_cost',10,2);
            $table->string('description');
            $table->bigInteger('doctorId')->unsigned();
            $table->foreign('doctorId')->references('id')->on('doctors');
            $table->tinyInteger('row_delete');
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
        Schema::dropIfExists('orders');
    }
};
