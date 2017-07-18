<?php

use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

          	$data = [];
          	for($i=24; $i<=43; $i++) {
          		$tmp = [];
              $tmp['user_id'] = $i;
          		$tmp['intro'] = '这是个人介绍';
          		$tmp['address'] = '个人地址';
          		$tmp['job'] = '工作';
          		$tmp['headpic'] = '/upload/a.jpg';
          		$data[] = $tmp;
          	}  
          	DB::table('user_details') -> insert($data);
    }
}
