@extends('admin.master')

@section('title', '后台管理--用户列表')

@section('content')
<div class="mws-panel-header">
  <span class="mws-i-24 i-table-1">用户列表</span>
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
        <th title="Browser">用户名</th>
        <th title="Platform(s)">邮箱</th>
        <th title="Engine version">用户组</th>
        <th title="CSS grade">状态</th>
        <th title="CSS grade">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr class="gradeX even">
        <td>{{ $asc++ }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td class="center">{!! role($user->role) !!}</td>
        <td class="center">{!! isdelete($user->isdelete) !!}</td>
        <td class="center">
          <a style="text-decoration:none" href="{{ url('admin/user/update') }}/{{ $user->id }}">修改</a>
          <span>|</span>
          <a style="text-decoration:none" href="{{ url('admin/user/delete') }}/{{ $user->id }}">删除</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="mws-pagination clearfix" style="margin-top:20px">
  <div id="pages">{!! $users->render() !!}</div>
</div>
@endsection