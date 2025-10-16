<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('object_id');
            $table->unsignedInteger('image_id');
            $table->integer('object_type')->default(1)->comment('1=not use yet,2=category,3=product,4=offer,5=slider');
            $table->integer('object_status')->nullable()->comment('which will by provide own object as comment modal');
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
        Schema::dropIfExists('other_image');
    }
}
