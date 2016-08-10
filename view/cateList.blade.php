@extends('admin.master')

@section('title', '后台管理--分类列表')

@section('content')
<div class="mws-panel-header">
  <span class="mws-i-24 i-table-1">分类列表</span>
</div>
<div class="mws-panel-body">
  @if (session('tips'))
  <div class="mws-form-message {{ session('status') }}">
    <ul>
      <li>{{ session('tips') }}</li>
    </ul>
  </div>
  @endif
  <table class="mws-table">
    <thead>
      <tr>
        <th title="Rendering engine">序号</th>
        <th title="Browser">分类名称</th>
        <th title="Platform(s)">PID</th>
        <th title="Engine version">PATH</th>
        <th title="CSS grade">状态</th>
        <th title="CSS grade">
          操作　｜
          <a href="{{ url('admin/cate/back') }}/{{ $cates[0]->pid or null }}" style="text-decoration:none">返回上级目录</a>
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cates as $cate)
      <tr class="gradeX even">
        <td>{{ $asc++ }}</td>
        <td>{{ $cate->name }}</td>
        <td>{{ $cate->pid }}</td>
        <td class="center">{{ $cate->path }}</td>
        <td class="center">{!! cateStatus($cate->status) !!}</td>
        <td class="center" style="text-align:center;width:330px">
          <a style="text-decoration:none" href="{{ url('admin/cate/cate') }}/{{ $cate->id }}">查看子分类</a>
          <span>|</span>
          <a style="text-decoration:none" href="{{ url('admin/cate/addson') }}/{{ $cate->id }}">添加子分类</a>
          <span>|</span>
          <a style="text-decoration:none" href="{{ url('admin/cate/update') }}/{{ $cate->id }}">修改</a>
          <span>|</span>
          <a style="text-decoration:none" href="{{ url('admin/cate/delete') }}/{{ $cate->id }}">删除</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="mws-pagination clearfix" style="margin-top:20px"></div>
@endsection