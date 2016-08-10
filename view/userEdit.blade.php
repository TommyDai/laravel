@extends('admin.master')

@section('title', '后台管理--修改用户')

@section('content')
<div class="mws-panel-header">
  <span class="mws-i-24 i-list">修改用户信息</span>
</div>
<div class="mws-panel-body">
  @foreach ($user as $u)
  <form class="mws-form" action="{{ url('admin/user/update').'/'.$u->
    id }}" method="post">
        {{ csrf_field() }}
    @if (count($errors) > 0)
      <div class="mws-form-message error">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('tips'))
      <div class="mws-form-message {{ session('status') }}">
        <ul>
          <li>{{ session('tips') }}</li>
        </ul>
      </div>
    @endif
    <div class="mws-form-inline">
      <div class="mws-form-row">
        <label>用 户 名</label>
        <div class="mws-form-item small">
          <input name="name" class="mws-textinput" type="text" value="{{ $u->name }}"></div>
      </div>
      <div class="mws-form-row">
        <label>邮　箱</label>
        <div class="mws-form-item small">
          <input name="email" class="mws-textinput" type="text" value="{{ $u->email }}"></div>
      </div>
      <div class="mws-form-row">
        <label>用 户 组</label>
        <div class="mws-form-item small">
          <select name="role">
            <option value="0" {{ selected($u->role, 0) }}>普通用户</option>
            <option value="1" {{ selected($u->role, 1) }}>尊贵会员</option>
            <option value="2" {{ selected($u->role, 2) }}>管理员</option>
            <option value="3" {{ selected($u->role, 3) }}>超级管理员</option>
          </select>
        </div>
      </div>
      <div class="mws-form-row">
        <label>状　态</label>
        <div class="mws-form-item clearfix">
          <ul class="mws-form-list inline">
            <li>
              <input name="isdelete" value="0" type="radio" {{ checked($u->
              isdelete, 0) }}>
              <label>正常</label>
            </li>
            <li>
              <input name="isdelete" value="1" type="radio" {{ checked($u->
              isdelete, 1) }}>
              <label>拉黑</label>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="mws-button-row">
      <input value="提交" class="mws-button red" type="submit">
      <input value="撤销" class="mws-button gray" type="reset"></div>
  </form>
  @endforeach
</div>
@endsection