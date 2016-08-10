@extends('admin.master')

@section('title', '后台管理--添加分类')

@section('content')
<div class="mws-panel-header">
  <span class="mws-i-24 i-list">修改分类</span>
</div>
<div class="mws-panel-body">
  @if (session('tips'))
  <div class="mws-form-message {{ session('status') }}">
    <ul>
      <li>{{ session('tips') }}</li>
    </ul>
  </div>
  @endif

  @foreach ($cate as $c)
  <form class="mws-form" action="{{ url('admin/cate/update') }}/{{ $c->
    id }}" method="post">
        {{ csrf_field() }}
    <div class="mws-form-inline">
      <div class="mws-form-row" style="background:url('/admin/css/icons/32/report_edit.png') no-repeat 80px 46px">
        <div class="mws-form-item large">
          <div class="mws-form-cols clearfix">

            <div class="mws-form-col-2-8">
              <label>分类名</label>
              <div class="mws-form-item large">
                <input class="mws-textinput" type="text" name="name" value="{{ $c->name }}"></div>
            </div>
            <div class="mws-form-col-2-8">
              <label>是否显示</label>
              <div class="mws-form-item large">
                <select class="mws-textinput" name="status" style="height:30px;padding:0 3px">
                  <option value="0" {{ selected($c->status, 0) }}>显示</option>
                  <option value="1" {{ selected($c->status, 1) }}>隐藏</option>
                </select>
              </div>
            </div>
            <div class="mws-form-col-2-8">
              <label>PID</label>
              <div class="mws-form-item large">
                <input class="mws-textinput" type="text" name="pid" value="{{ $c->pid }}" readonly></div>
            </div>
            <div class="mws-form-col-2-8">
              <label>PATH</label>
              <div class="mws-form-item large">
                <input class="mws-textinput" type="text" name="path" value="{{ $c->path }}" readonly></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mws-button-row">
      <input value="提交" class="mws-button red" type="submit">
      <a href="{{ url('admin/cate/prev') }}/{{ $c->pid }}" style="text-decoration:none">
        <input value="返回" class="mws-button gray" type="button"></a>
    </div>
  </form>
  @endforeach
</div>
@endsection