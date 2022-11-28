<?php

//Author : Wai Hau Guan

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->double('productPrice');
            $table->double('promotionPrice')->nullable();
            $table->string('productDetail');
            $table->integer('quantity');
            $table->date('datePublish');
            $table->string('productImage');
            $table->string('colour');
            $table->string('categoryName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
