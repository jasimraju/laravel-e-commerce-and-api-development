<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->default(1)->comment('1=active,2=inactive');
            $table->string('alt_text')->nullable();
            $table->integer('type')->nullable()->comment('1=image,2=video,3=icon,4=pdf,5=svg,6=other');
            $table->integer('upload_user_id')->nullable();
            $table->string('image_ext')->nullable();
            $table->string('folder_location')->nullable();
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
        Schema::dropIfExists('image');
    }
}
