<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * 用户表
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id')->comment('用户id');
                $table->char('name',20)->comment('用户名');
                $table->char('password',255)->comment('用户密码');
                $table->enum('auth',['0','1'])->default('0')->comment('用户权限0为普通用户，1为管理员');
                $table->char('email',50)->nullable()->comment('用户邮箱');
                $table->char('remember_token',255)->comment('用户标识');
                $table->timestamps();
            });
        } else {
            Schema::table('users', function ($table) {
                // 添加的字段
                // if (!Schema::hasColumn('users', 'b')) {
                //     //
                //     $table->string('b');
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
        // Schema::dropIfExists('users');
    }
}
