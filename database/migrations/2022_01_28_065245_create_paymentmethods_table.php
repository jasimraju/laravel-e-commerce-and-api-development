<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentmethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('language_file_name')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1)->comment('1=icon,2=image,3=image_gallary');
            $table->string('route')->nullable();
            $table->string('setting_route')->nullable();
            $table->string('setting_modal_name')->nullable();
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
        Schema::dropIfExists('paymentmethods');
    }
}
