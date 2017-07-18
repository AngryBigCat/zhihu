<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations
     * 问题表
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id')->comment('问题id');
            $table->integer('user_id')->comment('用户id');
            $table->char('title',50)->comment('问题标题');
            $table->text('describe')->nullable()->comment('问题描述');
            $table->integer('visit_count')->default(0)->comment('问题浏览数');
            $table->softDeletes()->comment('软删除');
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
        Schema::dropIfExists('questions');
    }
}
