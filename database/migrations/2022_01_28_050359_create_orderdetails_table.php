<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('varient_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('return_id')->nullable();
            $table->unsignedInteger('stock_load_id')->nullable();
            $table->double('price',10, 4);
            $table->string('other')->nullable();
            $table->double('discount',10, 4)->nullable();
            $table->unsignedInteger('delivery_id')->nullable();
            $table->boolean('is_seen_by_supplier')->default(0);
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
        Schema::dropIfExists('orderdetails');
    }
}
