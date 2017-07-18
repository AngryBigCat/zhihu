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
        $data = [];
        for($i=0;$i<50;$i++){
            $tmp = [];
            $tmp['user_id'] = rand(1,20);
            $tmp['tag_id'] = rand(1,20);
            $tmp['title'] = '神回复'.($i+1);
            $tmp['describe'] = '额监考老师按时吃阿达额驸案件案发啊啊放假阿卡发咖啡机啊积分卡积分加快分解开关机';
            $tmp['qs_img'] = '/img/avatar04.png';
            $tmp['topic'] = '1,2,3,4,5';
            $tmp['visit_count'] = rand(100,1000);
            $data[]=$tmp;
        }
        DB::table('questions')->insert($data);
    }
}
