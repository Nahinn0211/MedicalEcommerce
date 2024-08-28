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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('discount_amount', 10, 2)->nullable(); // Số tiền giảm giá (nếu có)
            $table->integer('discount_percentage')->nullable(); // Phần trăm giảm giá (nếu có)
            $table->dateTime('valid_from')->nullable(); // Thời gian bắt đầu có hiệu lực
            $table->dateTime('valid_until')->nullable(); // Thời gian hết hạn
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
        Schema::dropIfExists('discounts');
    }
};
