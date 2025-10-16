<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('payment_id')->nullable();
            $table->unsignedInteger('admin_id')->nullable();
            $table->unsignedInteger('shipaddress_id')->nullable();
            $table->unsignedInteger('billingaddress_id')->nullable();
            $table->unsignedInteger('delivery_id')->nullable();
            $table->unsignedInteger('orderstatus_id')->nullable();
            $table->string('email')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
            $table->boolean('is_delivered')->default(0);
            $table->string('transaction_id')->nullable();
            $table->string('order_from')->nullable();
            $table->string('order_note')->nullable();
            $table->string('order_ip')->nullable();
            $table->integer('order_sku');
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
    }
}
