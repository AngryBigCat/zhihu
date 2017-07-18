<?php
	
	function getTagNameById($id)
	{
		if($id =='0'){
			return '顶级分类';
		}
		$info = DB::table('tags')->where('id','=',$id)->first();

		return $info->tag_name;
	}

	function getTagNameByIds($id)
	{
		if($id =='0'){
			return '';
		}
		$info = DB::table('tags')->where('id','=',$id)->first();

		return $info->tag_name;
	}
?>