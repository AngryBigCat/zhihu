<?php

use Illuminate\Database\Seeder;

class User_detailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $address=['北京','天津','南京','上帝','公主坟','上海'];
        $job = ['白领','黑带','警察','经理','小商贩','城管','教师','学生'];
        $data=[];
        for ($i=0; $i <20 ; $i++) { 
        	$tmp=[];
        	$tmp['intro']='俺是个好人';
        	$tmp['address'] = $address[rand(0,5)];
        	$tmp['job'] = $job[rand(0,7)];
        	$tmp['headpic'] = '/img/user'.rand(1,8).'-128x128.jpg';

        	$data[] = $tmp;
        }

        DB::table('user_details')->insert($data);
    }
}
