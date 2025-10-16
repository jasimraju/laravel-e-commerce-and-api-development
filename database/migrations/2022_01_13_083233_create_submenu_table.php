<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenu', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('callback')->nullable();
            $table->string('dataurl')->nullable();
            $table->string('icon')->nullable();
            $table->string('view_port')->nullable();
            $table->string('menu_items_id')->nullable();
            $table->string('modal_name')->nullable();
            $table->string('language_file_name')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('update_by')->nullable();
            $table->integer('module_id')->nullable();
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
        Schema::dropIfExists('submenu');
    }
}
