<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======
// Use Hash;
>>>>>>> 8d4719490183a0ea5e460ad3129d27b6fb2f3e47

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
        for ($i=0; $i<20; $i++) { 
        	$tmp=[];
        	$tmp['name']=str_random(10);
        	$tmp['password'] = Hash::make('lamp179');
        	$tmp['email'] = rand(100000,999999).'@qq.com';
        	
        	$data[] = $tmp;
        }

        DB::table('users')->insert($data);
    }
}
