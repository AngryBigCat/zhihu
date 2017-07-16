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
                $table->unsignedInteger('user_id')->comment('用户id');
                $table->unsignedInteger('commentable_id')->comment('关联id');
                $table->string('commentable_type')->comment('类型');
                $table->text('content')->comment('评论内容');
                $table->timestamp('deleted_at')->comment('软删除');
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
