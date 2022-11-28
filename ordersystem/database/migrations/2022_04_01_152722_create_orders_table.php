<?php

//Author : Soong Wen Xin

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custId');
            $table->date('orderDate');
            $table->double('totalAmount');
            $table->string('shipName');
            $table->string('shipPhone');
            $table->string('shipAddress');
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
        Schema::dropIfExists('orderDetails');
    }
};
