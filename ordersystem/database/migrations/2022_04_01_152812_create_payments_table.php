<?php

//Author : Soong Wen Xin

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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('paymentId');
            $table->integer('orderId');
            $table->integer('custId');
            $table->date('paymentDate');
            $table->string('payMethod');
            $table->string('fromAccount');
            $table->double('totalAmount');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
