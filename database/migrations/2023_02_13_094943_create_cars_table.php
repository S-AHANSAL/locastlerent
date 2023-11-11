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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('car_name', 100);
            $table->string('car_regno', 100)->unique();
            $table->string('car_city', 100);
            $table->date('date_gris');
            $table->date('date_assurance');
            $table->date('date_circ');
            $table->string('car_owner', 100);
            $table->string('car_status', 100)->default('Available');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->softDeletes();


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
        Schema::dropIfExists('cars');
    }
};
