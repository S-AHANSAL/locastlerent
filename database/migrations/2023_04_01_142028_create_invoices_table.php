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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('NumberInvoice',100)->unique();
            $table->string('ObjetInvoice',100);
            $table->date('DateInvoice',100);
            $table->string('ClientNameInvoice',100);
            $table->string('ICEInvoice',100)->nullable();
            $table->longText('LocationInvoice');
            $table->string('NphoneInvoice',100);
            $table->string('MethodPaymentInvoice',100)->nullable();
            $table->string('TypeInvoice',100);
            $table->string('EtatSignatureInvoice',100)->default('yes');

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('invoices');
    }
};
