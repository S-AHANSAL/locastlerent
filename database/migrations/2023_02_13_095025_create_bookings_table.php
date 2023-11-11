<?php

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('client_id');
            $table->string('datetime_fo_to', 100);
            $table->string('location_fo', 100);
            $table->string('location_to', 100);
            $table->integer('car_price');
            $table->integer('number_days');
            $table->integer('sum_price');
            $table->string('status_payment', 100);
            $table->string('status_return', 100)->default('Normal');
            $table->string('type_softDeletes', 100)->nullable();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('client_id')->references('id')->on('clients');

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
        Schema::dropIfExists('bookings');
    }

    protected function sumPrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value." DH",
        );
    }
};
