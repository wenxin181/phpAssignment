<?php

//Author : Soong Wen Xin

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cartId');
            $table->integer('productId');
            $table->integer('custId');
            $table->integer('cartQuantity');
            $table->double('unitPrice');
            $table->double('subTotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('carts');
    }
};
