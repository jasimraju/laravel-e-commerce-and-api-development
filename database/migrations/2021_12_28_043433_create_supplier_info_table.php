<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('business_user_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('supplier_name');
            $table->string('supplier_code');
            $table->string('supplier_details')->nullable();
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
        Schema::dropIfExists('supplier_info');
    }
}
