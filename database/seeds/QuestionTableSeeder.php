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
        //
        $data = [];
        for ($i=0; $i < 50; $i++) { 
        	$tmp = [];
        	$tmp['user_id'] = rand(1,20);
        	$tmp['title'] = '这是第'.$i.'条数据';
        	$tmp['content']='Laravel 使用填充类和测试数据提供了一个简单方法来填充数据到数据库。所有的填充类都位于 database/seeds 目录。填充类的类名完全由你自定义，但最好还是遵循一定的规则，比如可读性，例如 UserTableSeeder 等等。安装完 Laravel 后，会默认提供一个DatabaseSeeder 类。从这个类中，你可以使用 call 方法来运行其他填充类，从而允许你控制填充顺序。';
        	$tmp['qs_img']='img/photo'.rand(1,4).'.jpg';
        	$tmp['count']=rand(100,1000);
        	$data[]=$tmp;
        }
        DB::table('questions')->insert($data);
    }
}
