<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 问题表
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('questions')) {
            Schema::create('questions', function (Blueprint $table) {
                $table->increments('id')->comment('问题id');
                $table->integer('user_id')->comment('用户id');
                $table->char('title',50)->comment('问题标题');
                $table->text('content')->comment('问题内容');
                $table->char('qs_img',255)->nullable()->comment('问题题图');
                $table->integer('count')->comment('问题浏览数');
                $table->timestamps();
            });
        } else {
             Schema::table('questions', function ($table) {
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
        Schema::dropIfExists('questions');
    }
}
