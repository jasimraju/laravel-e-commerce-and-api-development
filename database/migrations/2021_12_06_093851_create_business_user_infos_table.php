<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_user_infos', function (Blueprint $table) {
               $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedInteger('country_id');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('company_name');
            $table->unsignedInteger('business_type_infos_id');
            $table->string('client_code')->comment('only 4 digit slug id');
            $table->string('uen_number')->nullable();
            $table->string('load_area_stall_permit_or_permises_regristy')->nullable();
            $table->integer('status')->default(1)->comment('1=active,2=inactive');
            $table->string('password');
            $table->string('last_login_ip')->nullable();
            $table->string('last_login_durtion')->nullable();
            $table->string('last_login_name')->nullable();
            $table->string('last_login_type')->nullable();
            $table->string('last_active_device_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('business_user_infos');
    }
}
