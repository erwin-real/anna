<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department');

            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('warehouse_id')->nullable();

            $table->string('pr')->nullable();
            $table->timestamp('order_date')->nullable();
            $table->string('remarks')->nullable();

            $table->tinyInteger('mne')->default(2);
            $table->timestamp('mne_date')->nullable();
            $table->string('mne_remarks')->nullable();

            $table->tinyInteger('warehouse')->default(2);
            $table->timestamp('warehouse_date')->nullable();
            $table->string('warehouse_remarks')->nullable();

            $table->tinyInteger('amg')->default(2);
            $table->timestamp('amg_date')->nullable();
            $table->string('amg_remarks')->nullable();

            $table->boolean('received')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('purchase_requests');
    }
}
