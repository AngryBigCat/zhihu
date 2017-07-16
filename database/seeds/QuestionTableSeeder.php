<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'AngryCat',
            'email' => 'angrycat123@163.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('questions')->insert([
            'user_id' => 1,
            'title' => '怎样看待冯小刚吐槽现在的年轻演员娘？',
            'topic' => '1,2,3,4,5',
            'describe' => '喂喂，你先想一想电影里异形为什么那么厉害? 异形在飞船，里，啊! 你想想一只老虎跑进坦克里，坦克里能活下来几个人? 那么问题来了，老虎能打过坦克么？ 最后，对于甲壳类，我是向来支持清蒸的，看它头那么长蟹黄一定很多吧? '
        ]);
    }
}
