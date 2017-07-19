<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_detail;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\FollowRelation;

class PeopleController extends Controller
{
    
    /**
     * 我的主页 -- 回答
     */
    public function answers()
    {
        $_SESSION['id'] = Auth::id();
        // 获取回答的问题id
        $id = Auth::id();
        $qs_id = \App\Answer::where('user_id', $id)->select('question_id')->get();
        $info = DB::table('questions as qs')
            ->Join('answers', 'qs.id','=','answers.question_id')
            ->Join('users', 'answers.user_id','=','users.id')
            ->Join('user_details', 'answers.user_id', '=', 'user_details.user_id')
            ->where('answers.user_id', $id)
            ->whereNull('answers.deleted_at')
            ->whereIn('qs.id', $qs_id)
            ->select('qs.id','qs.title','qs.describe','users.id as uid','users.name','user_details.headpic','user_details.a_word','answers.id as ans_id','answers.content')
            ->get();
        $user = $this->getUser();
        $count = $this->getCount();

        return view('home.people.answers',['user'=>$user,'info'=>$info,'count'=>$count]);
    }

    /**
     * 用户主页  -- 回答
     */
    public function answer($id)
    {
        $_SESSION['id'] = $id;
        // 获取回答的问题id
        $qs_id = \App\Answer::where('user_id', $id)->select('question_id')->get();
        $info = DB::table('questions as qs')
            ->Join('answers', 'qs.id','=','answers.question_id')
            ->Join('users', 'answers.user_id','=','users.id')
            ->Join('user_details', 'answers.user_id', '=', 'user_details.user_id')
            ->where('answers.user_id', $id)
            ->whereNull('answers.deleted_at')
            ->whereIn('qs.id', $qs_id)
            ->select('qs.id','qs.title','qs.describe','users.id as uid','users.name','user_details.headpic','user_details.a_word','answers.id as ans_id','answers.content')
            ->get();
        $user = $this->getUser();
        $count = $this->getCount();
        return view('home.people.answers',['user'=>$user,'info'=>$info,'count'=>$count]);
    }
    /**
     * 我的主页 -- 提问
     */
    public function asks()
    {
        $id = $_SESSION['id'];
        $info = \App\Question::where('user_id', $id)
            ->whereNull('deleted_at')
            ->get();

        return view('home.people.asks',['info'=>$info]);
    }

    /**
     * 我的主页 -- 关注的话题
     */
    public function topics()
    {
        $id = $_SESSION['id'];
        $info = User::find($id)
        ->followings(\App\Tag::class)
        ->get();
        return view('home.people.topics', ['info'=>$info]);
    }
    /**
     * 我的主页 -- 收藏
     */
    public function collections()
    {
        $id = $_SESSION['id'];
        $info = User::find($id)->collects;
        return view('home.people.collections', ['info'=>$info]);
    }

    /**
     * 我关注的收藏
     */
    public function follow_collection()
    {
        $id = $_SESSION['id'];
        $info = User::find($id)->followings(\App\Collect::class)->get();
        return view('home.people.follow_collections', ['info'=>$info]);
    }
    /**
     * 我的主页 -- 关注的人
     */
    public function following()
    {
        $id = $_SESSION['id'];
        $user = User::find($id);
        $followings = $user->followings(\App\User::class)
            ->join('user_details','users.id','=','user_details.user_id')
            ->select('users.id','users.name','user_details.headpic','user_details.a_word')
            ->get();
        return view('home.people.following', ['followings'=>$followings]);
    }

    /**
     * 我的主页 -- 关注我的人
     */
    public function follower()
    {
        $id = $_SESSION['id'];
        $user = User::find($id);
        $followers = $user->followers()
            ->join('user_details','users.id','=','user_details.user_id')
            ->select('users.id','users.name','user_details.headpic','user_details.a_word')
            ->get();
        // dd($followers);
        return view('home.people.follower', ['followers'=>$followers]);
    }

    /**
     * 我的主页 -- 关注的问题
     */

    public function follow_question()
    {
        $id = $_SESSION['id'];
        $user = User::find($id);
        $que = $user->followings(\App\Question::class)->get();

        return view('home.people.follow_question', ['que'=>$que]);
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
            'intro' => $request->intro,
            'edu' => $request->edu
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

            $res = \App\User_detail::where('user_id',$id)->update(['headpic' => $filename.'.png']);

            if ($res) {
                echo json_encode(['result'=>'ok','file'=>'/uploads/headPic/'.$filename.'.png']);
            } else {
                echo json_encode(['result'=>'faied']);
            }

        }
    }

    /**
     * 修改封面图片
     */
    public function edit_cover(Request $request)
    {
        $this->validate($request, [
            'cover-img' => 'required|dimensions:min_width=1200,min_height:240'
        ],[
            'cover-img.dimensions' => '请上传宽度大于 1200px，高度大于 240px 的封面图片。',
            'cover-img.required' => '请选择一张图片'

        ]);
        // 文件夹啊
        if ($request->hasFile('cover-img')) {
            $dirname = './uploads/coverPic/';
            $id = Auth::id();
            $cover = DB::table('user_details')->where('user_id',$id)->select('coverpic')->first();
            if ($cover->coverpic != "") {
                if (file_exists($dirname.$cover->coverpic)) {
                    unlink($dirname.$cover->coverpic);
                }
            }
            //创建文件的名字
            $filename = time().rand(10000,99999);
            //获取文件的后缀
            $suffix = $request->file('cover-img')->getClientOriginalExtension();
            //文件名
            $file = $filename .'.'. $suffix;
            //移动
            $request->file('cover-img')->move($dirname,$dirname.$file);
        }
       
        //修改图片属性
        $res = \App\User_detail::where('user_id',$id)->update(['coverpic' => $file]);

        if ($res) {
            return back()->with('info', '上传成功');
        } else {
            return back()->with('info', '上传失败');
        }
    }

    /**
     * 关注用户
     */
    public function toggle_follow(Request $request)
    {
        $uid = $request->uid;
        $res = Auth::user()->isFollowing(User::find($uid));
        if($res) {
            Auth::user()->unfollow(User::find($uid));
            echo json_encode(['status'=>1, 'msg'=>'取消关注成功']);
        } else {
            Auth::user()->follow(User::find($uid));
            echo json_encode(['status'=>0, 'msg'=>'关注成功']);
        }
    }

    /**
     * 获取用户和用户信息
     */
    public function getUser()
    {
        if (!empty($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $user = DB::table('users')
                ->join('user_details','users.id','=','user_details.user_id')
                ->where('users.id',$id)
                ->whereNull('users.deleted_at')
                ->first();
            return $user;
        }
    }
    /**
     * 获取当前登录用户的 回答数、提问数、关注的话题数、关注者数和关注数
     */
    public function getCount()
    {
        if (!empty($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $user = User::find($id);
            // 回答数
            $ans_count = $user->answers()->whereNull('answers.deleted_at')->count();
            // 提问数
            $que_count = $user->questions()->whereNull('questions.deleted_at')->count();

            // 关注的问题数
            $follow_que_count = $user->followings(\App\Question::class)->whereNull('questions.deleted_at')->count();
            // 话题数
            $tag_count = $user->followings(\App\Tag::class)->count();
            // 关注数
            $followings_count = $user->followings(\App\User::class)->whereNull('users.deleted_at')->count();
            // 关注者数
            $followers_count = $user->followers()->whereNull('users.deleted_at')->count();
            // 创建的收藏夹数
            $collect_count = $user->collects()->count();
            // 关注的收藏夹数
            $follow_col_count = $user->followings(\App\Collect::class)->count();
            // 性别
            $sex = '';
            if (Auth::id() == $_SESSION['id']) {
                $sex = '我';
            } else {
                $sex = 'Ta';
            }
            $count = [
                'ans_count' => $ans_count,
                'que_count' => $que_count,
                'tag_count' => $tag_count,
                'followings_count' => $followings_count,
                'followers_count' => $followers_count,
                'sex' => $sex,
                'collect_count' => $collect_count,
                'follow_col_count' => $follow_col_count,
                'follow_que_count' => $follow_que_count
            ];
            return $count;
        }
    }
}
