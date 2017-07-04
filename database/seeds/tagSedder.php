<?php

use Illuminate\Database\Seeder;

class tagSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = [];
        for($i=0;$i<50;$i++){
            $tmp = [];
        	$tmp['pid'] = rand(0,50); 
        	$tmp['path'] = rand(0,50).'-'.rand(0,50);
            $tmp['tag_name'] = '什么都不想说了';
            $tmp['description'] = '飒飒积分身份及积分非法';
            $tmp['thumb'] = '/img/user6-128x128.jpg';
            $data[]=$tmp;
        }
         DB::table('tags')->insert($data);
    }
}
