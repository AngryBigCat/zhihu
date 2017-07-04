<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
<<<<<<< HEAD
     *
=======
     * 评论表
>>>>>>> gaoju
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->increments('id')->comment('评论id');
                $table->integer('user_id')->comment('用户id');
                $table->integer('question_id')->comment('问题id');
                $table->integer('answer_id')->comment('回答id');
                $table->text('content')->comment('评论内容');
                $table->timestamps();
            });
        } else {
            Schema::table('comments', function ($table) {
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
        Schema::dropIfExists('comments');
    }
}
