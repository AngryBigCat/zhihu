<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTagsTable extends Migration
{
    /**
     * Run the migrations.
<<<<<<< HEAD
     *
=======
     * 中间表  问题和话题表
>>>>>>> gaoju
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('question_tags')) {
            Schema::create('question_tags', function (Blueprint $table) {
                $table->integer('question_id')->comment('问题id');
                $table->integer('tag_id')->comment('话题id');
                $table->timestamps();
            });
        } else {
            Schema::table('question_tags', function ($table) {
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
        Schema::dropIfExists('question_tags');
    }
}
