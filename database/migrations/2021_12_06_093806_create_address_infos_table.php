<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('rel_id');
             $table->integer('type');
             $table->string('address');
             $table->string('post_code');
             $table->string('state');
             $table->string('town_city');
             $table->string('apartment');
             $table->string('email_address')->nullable();
             $table->string('phone')->nullable();
             $table->string('zone')->nullable();
             $table->unsignedInteger('country_id');
             $table->unsignedInteger('tyle')->default(1)->nullable()->comment('1=personal,2=billing,3=shiping,4=other');
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
        Schema::dropIfExists('address_infos');
    }
}
