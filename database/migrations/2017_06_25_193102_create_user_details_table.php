<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('user_id')->comment('用户id');
            $table->char('introduction',255)->nullable()->comment('个人简介');
            $table->char('address',255)->nullable()->comment('个人住址');
            $table->char('jog',100)->nullable()->comment('工作');
            $table->char('headpic',255)->nullable()->comment('头像');
            $table->enum('sex',['0','1','2'])->default('2')->comment('性别:0为女1为男2为保密');
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
        Schema::dropIfExists('user_details');
    }
}
