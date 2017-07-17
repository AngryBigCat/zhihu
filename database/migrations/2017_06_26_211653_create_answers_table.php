<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 回答表
     * @return void
     */
    public function up()
    {
            Schema::create('answers', function (Blueprint $table) {
                $table->increments('id')->comment('回答id');
                $table->integer('user_id')->comment('用户id');
                $table->integer('question_id')->comment('问题id');
                $table->integer('vote_count')->comment('赞数');
                $table->text('content')->comment('回答内容');
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
        Schema::dropIfExists('answers');
    }
}
