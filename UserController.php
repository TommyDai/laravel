<?php

namespace App\Http\Controllers\admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * 获取用户列表
     */
    public function getList()
    {   
        $users = DB::table('users')->orderBy('id', 'desc')->paginate(10);
        return view('admin.userList', ['users' => $users, 'asc' => 1]);
    }

    /**
     * 用户登录
     */
    public function postLogin(Request $request)
    {
        // 验证登陆信息
        $user = DB::table('users')->where('name', $request->input('name'))
            ->where('password', md5($request->input('password')))
            ->where('role', '>', 1)
            ->where('isdelete', '<>', 1)
            ->get();

        // 判断验证结果
        if (!empty($user) && $user[0]->name === $request->input('name')) {
            $request->session()->put('user', $user);
            return redirect()->action('Admin\UserController@getList');
        } else {
            return back()->with('tips', '用户名或密码错误')
                         ->with('name', $request->input('name'))
                         ->with('password', $request->input('password'));
        }
    }   

    /**
     * 用户退出登录
     */
    public function getLogout()
    {
        session()->forget('user');
        return back();
    }

    /**
     * 添加用户
     */
    public function getAdd()
    {
        return view('admin.userAdd');
    }

    /**
     * 验证添加用户并写入
     */
    public function postAdd(Request $request)
    {
        // 验证表单
        $this->validate($request, [
            'name' => 'required|unique:users,name|max:18|min:6',
            'email' => array('required', 'regex:/\w+@\w+(\.\w)+/', 'unique:users,email'),
            'password' => 'required|min:6|max:18',
        ], [
            'name.required' => '请输入用户名',
            'name.unique' => '该用户名已被使用',
            'name.max' => '用户名长度必须少于18位',
            'name.min' => '用户名长度必须大于6位',
            'email.required' => '请输入邮箱地址',
            'email.regex' => '邮箱格式不正确',
            'email.unique' => '该邮箱已被使用',
            'password.required' => '请输入密码',
            'password.min' => '密码长度必须大于6位',
            'password.max' => '密码长度必须小于18位',
        ]);

        // 写入用户信息
        $user = array_except($request->input(), ['_token']);
        $user['password'] = md5($user['password']);
        if(DB::table('users')->insert($user))
            return back()->with('tips', '添加成功')->with('status', 'success');
        return back()->with('tips', '添加失败')->with('status', 'error');
    }

    /**
     * 获取所有拉黑用户
     */
    public function getLock(Request $request)
    {
        $users = DB::table('users')
            ->where('isdelete', 1)->orderBy('id', 'desc')->paginate(10);
        return view('admin.userList', ['users' => $users, 'asc' => 1]);
    }

    /**
     * 显示用户修改页
     */
    public function getUpdate($id)
    {
        $user = DB::table('users')->where('id', $id)->get();
        return view('admin.userEdit', ['user' => $user]);
    }

    /**
     * 修改用户信息并写入
     */
    public function postUpdate(Request $request, $id)
    {
        // 验证修改是否合法
        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$id.'|max:18|min:6',
            'email' => array('regex:/\w+@\w+(\.\w)+/','unique:users,email,'.$id),
        ], [
            'name.required' => '请输入用户名',
            'name.unique' => '该用户名已被使用',
            'name.max' => '用户名长度必须少于18位',
            'name.min' => '用户名长度必须大于6位',
            'email.regex' => '邮箱格式不正确',
            'email.unique' => '该邮箱已被使用',
        ]);

        // 修改成功更新数据库
        $user = array_except($request->input(), ['_token']);
        if(DB::table('users')->where('id', $id)->update($user))
            return back()->with('tips', '修改成功')->with('status', 'success');
        return back()->with('tips', '没有任何更改')->with('status', 'error');
    }

    /**
     * 删除用户信息
     */
    public function getDelete($id=0)
    {
        if(DB::table('users')->where('id', $id)->delete())
            return back()->with('tips', '删除成功')->with('status', 'success');
        return back()->with('tips', '删除失败')->with('status', 'error');
    }
}
