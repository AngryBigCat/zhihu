<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_detail;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class PeopleController extends Controller
{
    /**
     * 我的主页 -- 动态
     */
    public function activities()
    {
        $user = $this -> getUser();
    	return view('home.people.activities',['user'=>$user]);
    }

    /**
     * 我的主页 -- 回答
     */
    public function answers()
    {
        $user = $this -> getUser();
        return view('home.people.answers',['user'=>$user]);
    }
    /**
     * 我的主页 -- 提问
     */
    public function asks()
    {
        $user = $this -> getUser();
        return view('home.people.asks',['user'=>$user]);
    }
    /**
     * 我的主页 -- 专栏
     */
    public function columns()
    {
        $user = $this -> getUser();
        return view('home.people.columns',['user'=>$user]);
    }
    /**
     * 我的主页 -- 收藏
     */
    public function collections()
    {
        $user = $this -> getUser();
        return view('home.people.collections',['user'=>$user]);
    }

    /**
     * 修改个人信息页面
     */
    public function edit(Request $request)
    {
        $id = Auth::user()->id;
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
        $id = Auth::user()->id;
        $imgstr = $request->image;
        $dirname = './uploads/headPic/';
        $headpic = DB::table('user_details')->where('user_id',$id)->select('headpic')->first();
        if (!empty($imgstr)) {

            if (file_exists($dirname.$headpic->headpic) && $headpic->headpic != 'boxed-bg.png') {
                unlink($dirname.$headpic->headpic);
            }
            // 转换为图片流
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

    /**
     * 获取用户和用户信息
     */
    private function getUser()
    {
        $id = Auth::user()->id;
        $user_d = User_detail::find($id);
        if (empty($user_d)) {
            User_detail::create(['user_id'=>$id]);
        }
        $user = DB::table('users')
            ->join('user_details','users.id','=','user_details.user_id')
            ->where('users.id',$id)
            ->whereNull('users.deleted_at')
            ->first();
        return $user;
    }
}
