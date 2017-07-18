<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->integer('user_id')->comment('用户id');
            $table->char('a_word', 100)->nullable()->comment('一句话介绍');
            $table->char('intro',255)->nullable()->comment('个人简介');
            $table->char('address',255)->nullable()->comment('个人住址');
            $table->char('job',100)->nullable()->comment('工作');
            $table->char('edu', 100)->nullable()->comment('教育经历');
            $table->char('headpic',255)->default('boxed-bg.png')->comment('头像');
            $table->integer('visit_count')->nullable()->comment('用户页计数');
            $table->char('coverpic',255)->nullable()->comment('封面图');
            $table->enum('sex',['0','1'])->default('1')->comment('性别:0为女1为男');
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
