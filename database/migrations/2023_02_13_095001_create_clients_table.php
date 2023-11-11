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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('client_name',100);
            $table->string('client_ref',200)->unique();
            $table->string('client_cin',100)->nullable();
            $table->string('client_email',100)->nullable();
            $table->string('client_phone',100);
            $table->string('client_address',200)->nullable();
            $table->string('client_flight_number',100)->nullable();
            $table->longText('client_path_cin_recto')->nullable();
            $table->longText('client_path_cin_verso')->nullable();
            $table->longText('client_path_license')->nullable();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('clients');
        
    }
};
