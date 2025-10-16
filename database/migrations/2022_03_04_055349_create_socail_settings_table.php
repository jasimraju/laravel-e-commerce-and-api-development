<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocailSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socail_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_id')->nullable();
            $table->string('app_secret')->nullable();
            $table->string('cal_back_url')->nullable();
            $table->integer('type')->default(1)->comment('1=facebook,2=gmail,3=other')->nullable();
            $table->json('other')->nullable();
            $table->json('paltfromname')->nullable();
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
        Schema::dropIfExists('socail_settings');
    }
}
