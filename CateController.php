<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    /**
     * 添加子分类
     * 
     * @param int $id
     */
    public function getAddson($id)
    {
        $cate = DB::table('categorys')->where('id', $id)->get();
        return view('admin.cateAddson', ['cate' => $cate]);
    }

    /**
     * 添加主分类
     *
     * @return view
     */
    public function getAdd()
    {
        return view('admin.cateAdd');
    }

    /**
     * 修改分类
     * 
     * @return view
     */
    public function getUpdate($id)
    {
        $cate = DB::table('categorys')->where('id', $id)->get();
        return view('admin.cateUpdate', ['cate' => $cate]);
    }

    /**
     * 提交分类修改
     *
     * @param object request
     * @param int    $id
     * @return view
     */
    public function postUpdate(Request $request, $id)
    {
        $cate = array_except($request->all(), ['_token', 'id']);
        if(DB::table('categorys')->where('id', $id)->update($cate))
            return back()->with('tips', '修改成功')->with('status', 'success');
        return back()->with('tips', '修改失败')->with('status', 'error');
    }

    /**
     * 返回上一级分类
     *
     * @param int $pid
     * @return view
     */
    public function getPrev($pid)
    {
        $cates = DB::table('categorys')->where('pid', $pid)->get();
        return view('admin.cateList', ['cates' => $cates, 'asc' => 1]);
    }

    /**
     * 添加主分类
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        //输入验证
        if(empty($request->input('name')))
            return back()->with('tips', '请输入分类名称')->with('status', 'error');

        //添加写入
        $cate = array_except($request->all(), ['_token']);
        if(DB::table('categorys')->insert($cate))
            return back()->with('tips', '分类添加成功')->with('status', 'success');
        return back()->with('tips', '分类添加失败')->with('status', 'error');
    }

    /**
     * 显示分类信息列表
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        // 查询所有主分类
        $cates = DB::table('categorys')
            ->where('pid', 0)
            ->where('status', 0)
            ->get();

        // 输出到视图
        return view('admin.cateList', ['cates' => $cates, 'asc' => 1]);
    }

    /**
     * 进入子分类
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCate($id)
    {
        // 根据ID查询子分类
        $cates = DB::table('categorys')->where('pid', $id)->get();

        // 如果有返回没有返回提示信息
        if($cates)
            return view('admin.cateList', ['cates' => $cates, 'asc' => 1]);
        return back()->with('tips', '没有子分类了')->with('status', 'error');
    }

    /**
     * 返回上一级分类
     * 
     * @param  int  $pid    
     * @return \Illuminate\Http\Response
     */
    public function getBack($pid)
    {
        // 根据PID查询父级分类
        $id = DB::table('categorys')
            ->select('id')->where('id', $pid)->get();

        // 如果查到继续往下否则返回提示信息
        if(!$id) return back()->with('tips', '没有上一级了')->with('status', 'error');

        // 查询所有上一级分类
        $id = DB::table('categorys')
            ->where('id', $id[0]->id)->get();
        $cates = DB::table('categorys')
            ->where('pid', $id[0]->pid)->get();

        // 判断查询结果并返回
        if($cates)
            return view('admin.cateList', ['cates' => $cates, 'asc' => 1]);
        return back();
    }

    /**
     * 删除分类
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        //判断是否有子分类如果有不允许删除
        $cates = DB::table('categorys')
            ->where('pid', $id)
            ->get();
        if($cates) 
            return back()
            ->with('tips', '该分类有下有子分类不允许删除')
            ->with('status', 'error');

        $has = DB::table('categorys')->where('id', $id)->get();

        //删除分类
        $cate = DB::table('categorys')
            ->where('id', $id)
            ->delete();

        //判断当前是否有同级分类，如没有返回父级分类
        if($has){
            $ha = DB::table('categorys')->where('pid', $has[0]->pid)->get();
            if(!$ha){
                $cate = DB::table('categorys')->where('id', $has[0]->pid)->get();
                $cates = DB::table('categorys')->where('pid', $cate[0]->pid)->get();
                return view('admin.cateList', ['cates' => $cates, 'asc' => 1]);exit();
            }
        }

        //判断删除结果
        if($cate)
            return back()->with('tips', '分类删除成功')->with('status', 'success');
        else
            return back()->with('tips', '分类删除失败')->with('status', 'error');
    }
}
