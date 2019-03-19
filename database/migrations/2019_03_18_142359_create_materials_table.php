<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
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
            $table->integer('stocks');
            $table->string('srp')->nullable();
            $table->string('discount')->nullable();
            $table->string('dealer_price')->nullable();
            $table->string('distributor_price')->nullable();
            $table->string('public_price')->nullable();
            $table->string('purchase_cost')->nullable();
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
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
