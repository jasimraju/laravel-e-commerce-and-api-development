<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_infos', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_number');
            $table->unsignedInteger('unit_id');
            $table->string('unit_qty');
            $table->string('online_display_name');
            $table->string('online_key_information');
            $table->unsignedInteger('category_info_id');
            $table->string('item_gross_weight')->nullable();
            $table->unsignedInteger('item_weight_unit_id')->nullable();
            $table->string('item_length')->nullable();
            $table->string('item_width')->nullable();
            $table->string('item_height')->nullable();
            $table->string('ingrdients')->nullable();
            $table->string('nutrition_fact')->nullable();
            $table->string('preparation')->nullable();;
            $table->string('preserving_measure')->nullable();
            $table->string('preserving_measure_unit')->nullable();
            $table->tinyInteger('no_expiry_data_rquired')->nullable();
            $table->tinyInteger('period_indicatore_of_self_life')->nullable();
            $table->tinyInteger('odd_shape_article')->nullable();;
            $table->tinyInteger('hala')->nullable();
            $table->tinyInteger('organic')->nullable();
            $table->tinyInteger('healthier_choice')->nullable();
            $table->tinyInteger('healther_drink')->nullable();
            $table->unsignedInteger('dept_id')->nullable();
            $table->unsignedInteger('halal_info_details_id')->nullable();
            $table->unsignedInteger('band_info_id')->nullable();
            $table->unsignedInteger('supplier_info_id')->nullable();
            $table->unsignedInteger('food_info_details_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('create_by')->nullable();
            $table->unsignedInteger('update_by')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active,2=Inactive');
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
        Schema::dropIfExists('product_infos');
    }
}
