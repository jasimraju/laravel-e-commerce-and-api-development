<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hala_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_info_id');
            $table->unsignedInteger('hala_info_id');
            $table->string('halal_exipirydate');
            $table->string('halal_number');
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
        Schema::dropIfExists('hala_details');
    }
}
