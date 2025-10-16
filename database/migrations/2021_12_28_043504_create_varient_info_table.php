<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVarientInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varient_info', function (Blueprint $table) {
            $table->id();
            $table->string('unit_of_quantity');
            $table->string('weight');
            $table->string('packet_size')->nullable();
            $table->unsignedInteger('packet_size_unit_id')->nullable();
            $table->string('carton_pack_size')->nullable();
            $table->unsignedInteger('product_info_id');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('gp_percentage')->nullable();
            $table->string('product_sku')->nullable();
            $table->unsignedInteger('product_price_id')->nullable();
            $table->string('varient_name')->nullable();
            $table->string('rsp_w_gst')->nullable();
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
        Schema::dropIfExists('varient_info');
    }
}
