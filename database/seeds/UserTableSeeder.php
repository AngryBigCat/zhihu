<?php

use Illuminate\Database\Seeder;
// Use Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[];
        for ($i=0; $i <20 ; $i++) { 
        	$tmp=[];
        	$tmp['name']=str_random(10);
        	$tmp['password'] = Hash::make('lijiaqi');
        	$tmp['email'] = rand(100000,999999).'@qq.com';
        	
        	$data[] = $tmp;
        }

        DB::table('users')->insert($data);
    }
}
