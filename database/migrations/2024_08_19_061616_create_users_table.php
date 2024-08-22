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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique('username');
            $table->string('email')->unique('email');
            $table->string('password');
            $table->dateTime('lastLogin')->nullable();
            $table->dateTime('lockedTime')->nullable();
            $table->integer('countLogin')->default(0);
            $table->string('urlImage')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->tinyInteger('role')->default(0);
            $table->enum('typeRole', ['CUSTOMER','DOCTOR','ADMIN'])->default('CUSTOMER');
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
        Schema::dropIfExists('users');
    }
};
