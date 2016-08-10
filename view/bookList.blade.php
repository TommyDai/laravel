@extends('admin.master')

@section('title', '后台管理--图书列表')

@section('content')
<style type="text/css">
  .isOn{cursor:pointer;}
</style>
<div class="mws-panel-header">
  <span class="mws-i-24 i-table-1">图书列表</span>
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
        <th title="Browser">书名</th>
        <th title="Platform(s)">作者</th>
        <th title="Engine version">出版社</th>
        <th title="CSS grade">新书</th>
        <th title="CSS grade">热销</th>
        <th title="CSS grade">低价</th>
        <th title="CSS grade">经典</th>
        <th title="CSS grade">上架</th>
        <th title="CSS grade">售价</th>
        <th title="CSS grade">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($books as $book)
      <tr class="gradeX even" bid="{{ $book->id }}">
        <td>{{ $asc++ }}</td>
        <td>
          <span style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;display:block;height:30xp;width:80px">{{ $book->name }}</span>
        </td>
        <td>
          <span style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;display:block;height:30xp;width:80px">{{ $book->author }}</span>
        </td>
        <td>
          <span style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;display:block;height:30xp;width:80px">{{ $book->band }}</span>
        </td>
        <td class="isOn" is="is_new">{!! isNew($book->is_new) !!}</td>
        <td class="isOn" is="is_hot">{!! isNew($book->is_hot) !!}</td>
        <td class="isOn" is="is_cheap">{!! isNew($book->is_cheap) !!}</td>
        <td class="isOn" is="is_classics">{!! isNew($book->is_classics) !!}</td>
        <td class="isOn" is="status">{!! isNew($book->status) !!}</td>
        <td>{{ $book->price }}</td>
        <td>
          <a style="text-decoration:none" href="{{ url('admin/book/update') }}/{{ $book->id }}">修改</a>
          <span>|</span>
          <a style="text-decoration:none" href="{{ url('admin/book/delete') }}/{{ $book->id }}">删除</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="mws-pagination clearfix" style="margin-top:20px">
  <div id="pages">{!! $books->render() !!}</div>
</div>
@endsection

@section('myjs')

  $('.isOn').click(function () {
    var isthis = $(this);
    var isName = $(this).attr('is');
    var value = $(this).parent().attr('bid');
    var status = $(this).children().first().html();
    $.post(
      'ison',
      {name:isName,status:status,id:value},
      function (data) {
        if(data == 1){
          isthis.html('<font color="red">是</font>');
        }else{
          isthis.html('<font>否</font>');
        }
      }
    );
  });

@endsection