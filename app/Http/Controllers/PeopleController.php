<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_detail;
use DB;

class PeopleController extends Controller
{
    /**
     * 我的主页 -- 动态
     */
    public function activities()
    {
        $id = 4;
        $user = User_detail::findOrFail($id);
    	return view('home.people.activities',['user'=>$user]);

        
    }

    /**
     * 我的主页 -- 回答
     */
    public function answers()
    {
        $id = 4;
        $user = User_detail::findOrFail($id);
    	return view('home.people.answers',['user'=>$user]);
    }
    /**
     * 我的主页 -- 提问
     */
    public function asks()
    {
        $id = 4;
        $user = User_detail::findOrFail($id);

    	return view('home.people.asks',['user'=>$user]);
    }
    /**
     * 我的主页 -- 专栏
     */
    public function columns()
    {
        $id = 4;
        $user = User_detail::findOrFail($id);

    	return view('home.people.columns',['user'=>$user]);
    }
    /**
     * 我的主页 -- 收藏
     */
    public function collections()
    {
        $id = 4;
        $user = User_detail::findOrFail($id);

    	return view('home.people.collections',['user'=>$user]);
    }

    /**
     * 修改个人信息
     */
    public function edit(Request $request)
    {
        $id = 4;
        $data = [
            'a_word' => $request->a_word,
            'sex' => $request->sex,
            'address' => $request->address,
            'job' => $request->job,
            'intro' => $request->intro
        ];

        $res = User_detail::where('user_id', $id)
        ->update($data);
        
        if ($res) {
            echo json_encode(['result' => 0, 'msg' => '修改成功']);
        } else {
            echo json_encode(['result' => 1, 'msg' => '修改失败']);
        }
    }

    /**
     * 修改头像
     */
    public function edit_headPic(Request $request)
    {
        $id = 4;
        $imgstr = $request->image;
        $dirname = './uploads/headPic/';
        $headpic = DB::table('user_details')->where('user_id',$id)->select('headpic')->first();
        if (!empty($imgstr)) {

            if (file_exists($dirname.$headpic->headpic)) {
                unlink($dirname.$headpic->headpic);
            }

            $imgdata = substr($imgstr,strpos($imgstr,",") + 1);
            $decodedData = base64_decode($imgdata);

            // 获取随机名称
            $filename = time() + rand(1000,9999);

            file_put_contents($dirname.$filename.'.png',$decodedData);

            $res = DB::table('user_details')->where('user_id',$id)->update(['headpic' => $filename.'.png']);
            if ($res) {
                echo json_encode(['result'=>'ok','file'=>'/uploads/headPic/'.$filename.'.png']);
            } else {
                echo json_encode(['result'=>'faied']);
            }

        }
    }
}
