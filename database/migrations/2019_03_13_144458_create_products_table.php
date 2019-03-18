<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plu');
            $table->string('main_desc');
            $table->string('other_desc')->nullable();
            $table->string('brand')->nullable();
            $table->string('supplier');
            $table->string('category');
            $table->boolean('retail')->default(0);
            $table->string('unit_measurement');
            $table->string('type');
            $table->double('srp', 15, 4)->nullable();
            $table->double('wholesaler_price', 15, 4)->nullable();
            $table->double('dealer_price', 15, 4)->nullable();
            $table->double('distributor_price', 15, 4)->nullable();
            $table->double('reseller_price', 15, 4)->nullable();
            $table->double('purchase_cost', 15, 4)->nullable();
            $table->integer('warning_quantity')->nullable();
            $table->integer('ideal_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
}
