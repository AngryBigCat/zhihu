<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     * 话题表
     * @return void
     */
    public function up()
    {


        if (!Schema::hasTable('tags')) {
            Schema::create('tags', function (Blueprint $table) {
                $table->increments('id')->comment('话题id');
                $table->integer('pid')->default(0)->comment('话题父id');
                $table->char('path',50)->default('0')->comment('父id下面的子id连接');
                $table->char('tag_name',50)->comment('话题名称');
                $table->text('description')->comment('话题描述');
                $table->char('img',255)->comment('话题缩略图');
                $table->timestamps();
            });
        } else {
             Schema::table('tags', function ($table) {
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
        Schema::dropIfExists('tags');
    }
}
