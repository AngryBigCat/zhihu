<?php
	
	function getTagNameById($id)
	{
		if($id =='0'){
			return '顶级分类';
		}
		$info = DB::table('tags')->where('id','=',$id)->first();

		return $info->tag_name;
	}
?>