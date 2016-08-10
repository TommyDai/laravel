@extends('admin.master')

@section('title', '后台管理--修改书信息')

@section('content')
<div class="mws-panel-header">
  <span class="mws-i-24 i-list">修改书信息</span>
</div>
<div class="mws-panel-body">

  <form class="mws-form" action="{{ url('admin/book/update') }}/{{ $book[0]->
    id }}" method="post" enctype="multipart/form-data">
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

            @foreach ($book as $b)
    <div class="mws-form-inline">
      <img src="{{ url() }}/uploads/{{ $b->
      image }}" style="height:270px;width:200px;border-radius:10px;position:absolute;left:650px;top:100px;padding:10px;background:#ddd">
      <div class="mws-form-row">
        <label>书　名</label>
        <div class="mws-form-item small">
          <input name="name" class="mws-textinput" type="text" value="{{ $b->name }}"></div>
      </div>
      <div class="mws-form-row">
        <label>作　者</label>
        <div class="mws-form-item small">
          <input name="author" class="mws-textinput" type="text" value="{{ $b->author }}"></div>
      </div>
      <div class="mws-form-row">
        <label>标　签</label>
        <div class="mws-form-item small">
          <input name="mark" class="mws-textinput" type="text" value="{{ $b->mark }}"></div>
      </div>
      <div class="mws-form-row">
        <label>出版社</label>
        <div class="mws-form-item small">
          <input name="band" class="mws-textinput" type="text" value="{{ $b->band }}"></div>
      </div>
      <div class="mws-form-row">
        <label>分　类</label>
        <div class="mws-form-item small">
          <select name="cate_id">
            @foreach ($cates as $c)
                            @if($c->pid == 0)
            <option value="{{ $c->id }}" {{ selected($b->cate_id, $c->id) }}>{{ $c->name }}</option>
            @else
            <option value="{{ $c->
              id }}" {{ selected($b->cate_id, $c->id) }}>　　┊┈ {{ $c->name }}
            </option>
            @endif
                        @endforeach
          </select>
        </div>
      </div>
      <div class="mws-form-row">
        <label>售　价</label>
        <div class="mws-form-item small">
          <input name="price" class="mws-textinput" type="text" value="{{ $b->price }}"></div>
      </div>
      <div class="mws-form-row">
        <label>封　面</label>
        <div class="mws-form-item small">
          <input style="left: -116.217px; top: 0px;" name="image" class="customfile-input" type="file"></div>
      </div>
      <div class="mws-form-row">
        <label>是否新书</label>
        <div class="mws-form-item clearfix">
          <ul class="mws-form-list inline">
            <li>
              <input name="is_new" value="0" type="radio" {{ checked($b->
              is_new, 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="is_new" value="1" type="radio" {{ checked($b->
              is_new, 1) }}>
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
              <input name="is_hot" value="0" type="radio" {{ checked($b->
              is_hot, 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="is_hot" value="1" type="radio" {{ checked($b->
              is_hot, 1) }}>
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
              <input name="is_cheap" value="0" type="radio" {{ checked($b->
              is_cheap, 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="is_cheap" value="1" type="radio" {{ checked($b->
              is_cheap, 1) }}>
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
              <input name="is_classics" value="0" type="radio" {{ checked($b->
              is_classics, 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="is_classics" value="1" type="radio" {{ checked($b->
              is_classics, 1) }}>
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
              <input name="status" value="0" type="radio" {{ checked($b->
              status, 0) }}>
              <label>否</label>
            </li>
            <li>
              <input name="status" value="1" type="radio" {{ checked($b->
              status, 1) }}>
              <label>是</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="mws-form-row">
        <label>描　述</label>
        <div class="mws-form-item medium">
          <textarea name="descri" rows="100%" cols="100%">{{ $b->descri }}</textarea>
        </div>
      </div>
    </div>
    <div class="mws-button-row">
      <input value="提交" class="mws-button red" type="submit">
      <a href="{{ url('admin/book/list') }}" style="text-decoration:none">
        <input value="返回列表" class="mws-button gray" type="button"></a>
    </div>
    <input type="hidden" name="oldimg" value="{{ $b->
    image }}">
            @endforeach
  </form>

</div>
@endsection