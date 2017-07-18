<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserInsertRequest;
use App\User;
use App\User_detail;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 显示用户列表
        $keywords = $request->keywords;
        $users = User::orderBy('id','desc')
        ->where(function($query)use($keywords){
            if (!empty($keywords)) {
                    $query->where('name','like','%'.$keywords.'%');
                }
            })
        ->paginate($request->input('num',10));

        return view('admin.user.index',['users'=>$users,'data'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 增加用户页面
        return view('admin.user.useradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsertRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->auth = $request->auth;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            $id = $user->id;
            $user_detail = new User_detail();
            $user_detail->user_id = $id;
            $user_detail->save();
            return redirect('/admin/user')->with(['info'=>'添加成功']);
        } else {
            return redirect('/admin/user')->with(['info'=>'添加失败']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $user_info = $user -> user_details;
        return view('admin.user.useredit',['user'=>$user,'user_info'=>$user_info]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->auth = $request->auth;
        if ($user->save()) {
            return redirect('admin/user')->with('info','成功修改id为'.$id.'用户的信息');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userinfo = User_detail::find($id);
        
        if (!empty($userinfo)) {
            if ($userinfo->headpic != 'boxed-bg.png') {
                unlink('./uploads/headPic/'.$userinfo->headpic);
            }
            $userinfo->delete();
        }
        $user = User::findOrFail($id);
        if ($user->delete()) {
            echo json_encode(['result'=>'ok','msg'=>'软删除成功']);
        } else {
            echo json_encode(['result'=>'faied','msg'=>'软删除失败']);
        }
    }

}
