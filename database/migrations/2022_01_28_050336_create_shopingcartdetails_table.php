<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopingcartdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopingcartdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('cache_id')->nullable();
            $table->unsignedInteger('shoping_cart_id')->nullable();
            $table->integer('qty');
            $table->double('price',10,4);
            $table->string('image');
            $table->string('other')->nullable();
            $table->double('discount',10,4)->nullable();
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
        Schema::dropIfExists('shopingcartdetails');
    }
}
