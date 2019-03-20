<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncodingOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encoding_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('supplier_id');
            $table->string('assistant')->nullable();
            $table->string('mir')->nullable();
            $table->string('pr')->nullable();
            $table->timestamp('order_date')->nullable();
            $table->timestamp('date_delivered')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('encoding_outs');
    }
}
