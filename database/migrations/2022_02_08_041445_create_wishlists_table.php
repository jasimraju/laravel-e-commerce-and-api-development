<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->integer('cache_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('user_ip')->nullable();
            $table->unsignedInteger('object_id')->nullable();
            $table->unsignedInteger('object_name')->nullable();
            $table->string('image')->nullable();
            $table->integer('type')->default(1)->comment('1=product,2=catgory,3=other');
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
        Schema::dropIfExists('wishlists');
    }
}
