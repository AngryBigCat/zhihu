<?php

namespace App\Http\Controllers;

use App\Tag;
use DB;

class LoginController extends Controller
{
	public function index()
	{
		$data = Tag::get()->toArray();

		function findTree($arr,$id=0)
		{
			$subs = [];
			foreach ($arr as $v) {
				if($v['pid']==$id){
					$subs[]=$v;
					$subs = array_merge($subs,findTree($arr,$v['id']));
				}
			}
			return $subs;
		}
		print_r(findTree($data,2));
	}

	
}
