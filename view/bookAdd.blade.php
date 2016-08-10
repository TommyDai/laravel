@extends('admin.master')

@section('title', '后台管理--添加新书')

@section('content')
<div class="mws-panel-header">
  <span class="mws-i-24 i-list">添加新书</span>
</div>
<div class="mws-panel-body">

  <form class="mws-form" action="{{ url('admin/book/add') }}" method="post" enctype="multipart/form-data">
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
        <label>书　名</label>
        <div class="mws-form-item small">
          <input name="name" class="mws-textinput" type="text" value="{{ old('name') }}"></div>
      </div>
      <div class="mws-form-row">
        <label>作　者</label>
        <div class="mws-form-item small">
          <input name="author" class="mws-textinput" type="text" value="{{ old('author') }}"></div>
      </div>
      <div class="mws-form-row">
        <label>标　签</label>
        <div class="mws-form-item small">
          <input name="mark" class="mws-textinput" type="text" value="{{ old('mark') }}"></div>
      </div>
      <div class="mws-form-row">
        <label>出版社</label>
        <div class="mws-form-item small">
          <input name="band" class="mws-textinput" type="text" value="{{ old('band') }}"></div>
      </div>
      <div class="mws-form-row">
        <label>分　类</label>
        <div class="mws-form-item small">
          <select name="cate_id">
            @foreach ($cates as $c)
                            @if($c->pid == 0)
            <option value="{{ $c->id }}" {{ selected(old('cate_id'), $c->id) }}>{{ $c->name }}</option>
            @else
            <option value="{{ $c->
              id }}" {{ selected(old('cate_id'), $c->id) }}>　　┊┈ {{ $c->name }}
            </option>
            @endif
                        @endforeach
          </select>
        </div>
      </div>
      <div class="mws-form-row">
        <label>售　价</label>
        <div class="mws-form-item small">
          <input name="price" class="mws-textinput" type="text" value="{{ old('price') }}"></div>
      </div>
      <div class="mws-form-row">
        <label>上传封面</label>
        <div class="mws-form-item small">
          <input style="left: -116.217px; top: 0px;" name="image" value="{{ old('image') }}" class="customfile-input" type="file"></div>
      </div>
      <div class="mws-form-row">
        <label>是否新书</label>
        <div class="mws-form-item clearfix">
          <ul class="mws-form-list inline">
            <li>
              <input name="is_new" value="0" type="radio" {{ checked(old('is_new'), 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="is_new" value="1" type="radio" {{ checked(old('is_new'), 1) }}>
              <label>是</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="mws-form-row">
        <label>是否热销</label>
        <div class="mws-form-item clearfix">
          <ul class="mws-form-list inline">
            <li>
              <input name="is_hot" value="0" type="radio" {{ checked(old('is_hot'), 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="is_hot" value="1" type="radio" {{ checked(old('is_hot'), 1) }}>
              <label>是</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="mws-form-row">
        <label>是否低价</label>
        <div class="mws-form-item clearfix">
          <ul class="mws-form-list inline">
            <li>
              <input name="is_cheap" value="0" type="radio" {{ checked(old('is_cheap'), 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="is_cheap" value="1" type="radio" {{ checked(old('is_cheap'), 1) }}>
              <label>是</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="mws-form-row">
        <label>是否经典</label>
        <div class="mws-form-item clearfix">
          <ul class="mws-form-list inline">
            <li>
              <input name="is_classics" value="0" type="radio" {{ checked(old('is_classics'), 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="is_classics" value="1" type="radio" {{ checked(old('is_classics'), 1) }}>
              <label>是</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="mws-form-row">
        <label>是否上架</label>
        <div class="mws-form-item clearfix">
          <ul class="mws-form-list inline">
            <li>
              <input name="status" value="0" type="radio" {{ checked(old('status'), 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="status" value="1" type="radio" {{ checked(old('status'), 1) }}>
              <label>是</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="mws-form-row">
        <label>描　述</label>
        <div class="mws-form-item medium">
          <textarea name="descri" rows="100%" cols="100%">{{ old('descri') }}</textarea>
        </div>
      </div>
    </div>
    <div class="mws-button-row">
      <input value="提交" class="mws-button red" type="submit">
      <input value="撤销" class="mws-button gray" type="reset"></div>
    <input type="hidden" name="addtime" value="{{ time() }}">
    <input type="hidden" name="scroce" value="0"></form>

</div>
@endsection