<?php

namespace App\Http\Controllers\admin;

use DB;
use Image;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * 书籍列表
     *
     * @return view
     */
    public function getList()
    {
        $arr = ['books' => DB::table('books')
            ->where('isdelete', 0)
            ->orderBy('id', 'desc')
            ->paginate(10), 'asc' => 1];
        return view('admin.bookList', $arr);
    }

    /**
     * 输出添加新书表单
     *
     * @return view
     */
    public function getAdd()
    {
        return view('admin.bookAdd', ['cates' => cates(), 'nu' => 0]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRecycle()
    {
        $arr = ['books' => DB::table('books')
            ->where('isdelete', 1)
            ->orderBy('id', 'desc')
            ->paginate(10), 'asc' => 1];
        return view('admin.bookRecycle', $arr);
    }

    /**
     * 回收站还原
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getBack($id)
    {
        if(DB::table('books')->where('id', $id)->update(['isdelete' => 0]))
            return back()->with('tips', '已还原')->with('status', 'success');
        return back()->with('tips', '还原失败')->with('status', 'error');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getKill()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        //验证表单
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'band' => 'required',
            'price' => 'numeric',
            'image' => 'required|image',
            'descri' => 'required',
        ], [
            'name.required' => '请输入书名',
            'author.required' => '请输入作者',
            'band.required' => '请输入出版社',
            'price.numeric' => '请正确输入售价',
            'image.required' => '请上传图片',
            'image.image' => '请上传图片',
            'descri.required' => '请输入描述',
        ]);

        //除去无用信息
        $book = array_except($request->input(), ['_token']);

        //生成处理图片
        $img = Image::make($request->file('image'));

        //拼接保存路径
        $imgName = public_path().DIRECTORY_SEPARATOR.
            'uploads'.DIRECTORY_SEPARATOR.uniqid().'.png';

        //判断路径是否存在不存在创建之
        if(!file_exists(dirname($imgName))) mkdir(dirname($imgName),0777);

        //保存修改尺寸后的图片
        $img->resize(400, 540)->save($imgName);

        //所有信息写入数据库
        $book['image'] = basename($imgName);
        if (DB::table('books')->insert($book))
            return back()->with('tips', '添加成功')->with('status', 'success');
        return back()->with('tips', '添加失败')->with('status', 'error');
    }

    /**
     * 删除
     *
     * @param  int  $id
     */
    public function getDelete($id)
    {
        if (DB::table('books')->where('id', $id)->update(['isdelete' => 1]))
            return back()->with('tips', '删除成功')->with('status', 'success');
        return back()->with('tips', '删除失败')->with('status', 'success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdate(Request $request, $id)
    {
        $book = DB::table('books')->where('id', $id)->get();
        return view('admin.bookUpdate', ['book' => $book, 'cates' => cates()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        //修改验证
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'band' => 'required',
            'price' => 'numeric',
            'descri' => 'required',
        ], [
            'name.required' => '请输入书名',
            'author.required' => '请输入作者',
            'band.required' => '请输入出版社',
            'price.numeric' => '请正确输入售价',
            'image.required' => '请上传图片',
            'descri.required' => '请输入描述',
        ]);

        //删除无用字段
        $book = array_except($request->input(), ['_token', 'oldimg']);

        //判断是否修改了原图
        if (!empty($request->file('image'))) {

            //拼接删除的图片路径
            $imgpath = public_path('uploads'.DIRECTORY_SEPARATOR.
                $request->input('oldimg'));

            //删除旧图
            if(file_exists($imgpath)) unlink($imgpath);

            //处理新图
            $img = Image::make($request->file('image'));
            $imgName = public_path().'/uploads/'.uniqid().'.png';
            if(!file_exists(dirname($imgName))) mkdir(dirname($imgName),0777);
            $img->resize(540, 400)->save($imgName);

            //写入修改信息
            $book['image'] = basename($imgName);
            if (DB::table('books')->where('id', $id)->update($book)){
                return back()->with('tips', '修改成功')->with('status', 'success');
            } else {
                unlink($imgName);
                return back()->with('tips', '修改失败')->with('status', 'error');
            }
        }

        //未修改原图
        if (DB::table('books')->where('id', $id)->update($book))
            return back()->with('tips', '修改成功')->with('status', 'success');
        return back()->with('tips', '修改失败')->with('status', 'error');
    }

    /**
     * ajax 修改状态
     *
     */
    public function postIson(Request $request)
    {
        //获取提交来的数据
        $id = $request->input('id');
        $status = $request->input('status');
        $name = $request->input('name');

        //数据转换
        $val = $status == '是' ? 0 : 1;
        
        //处理结果
        DB::table('books')->where('id', $id)->update([$name => $val]) ?
        print($val) : print(0);
    }
}
