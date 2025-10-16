<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('bg_color')->nullable();
            $table->string('language_file_name')->nullable();
            $table->string('fav_icon_status')->default(1)->comment('1=use by defult,2=custom fav_icon used');
            $table->string('sec_status')->default(1)->comment('1=use by defult,2=custom seo');
            $table->string('discount_type')->default(1)->comment('1=no discount,2=fixd amount discount,3=percentage');
            $table->string('discount_amount')->nullable();
            $table->longText('more_details')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('create_by')->unsigned()->nullable();
            $table->integer('update_by')->unsigned()->nullable();
            $table->integer('icon')->nullable();
            $table->integer('own_id')->unsigned()->nullable();
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
        Schema::dropIfExists('category_infos');
    }
}
