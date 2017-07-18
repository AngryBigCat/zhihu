<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations
     * 用户信息表
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('user_details')) {
            Schema::create('user_details', function (Blueprint $table) {
                $table->integer('user_id')->comment('用户id');
                $table->char('a_word', 100)->nullable()->comment('一句话介绍');
                $table->char('introduction',255)->nullable()->comment('个人简介');
                $table->char('address',255)->nullable()->comment('个人住址');
                $table->char('job',100)->nullable()->comment('工作');
                $table->char('headpic',255)->default('boxed-bg.png')->comment('头像');
                $table->char('coverpic',255)->nullable()->comment('封面图');
                $table->enum('sex',['0','1','2'])->default('2')->comment('性别:0为女1为男2为保密');
                $table->timestamps();
            });
        } else {
            Schema::table('user_details', function ($table) {
                // 添加的字段
                // if (Schema::hasColumn('user_details', 'headpic')) {
                      $table->char('headpic',255)->comment('头像')->default('boxed-bg.png')->change();
                // }
                // if (Schema::hasColumn('user_details', 'b')) {
                //     //
                //     $table->dropColumn('b');
                // }

            });
        }

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
