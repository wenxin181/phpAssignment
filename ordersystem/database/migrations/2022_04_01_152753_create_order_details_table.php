<?php

//Author : Soong Wen Xin

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('orderDetailsId');
            $table->integer('orderId');
            $table->integer('productId');
            $table->integer('orderQuantity');
            $table->double('unitPrice');
            $table->double('subTotal');
        });
    }

    public function down() {
        Schema::dropIfExists('order_details');
    }
};
