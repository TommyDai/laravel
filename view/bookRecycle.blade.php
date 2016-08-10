@extends('admin.master')

@section('title', '后台管理--书籍回收站')

@section('content')
<div class="mws-panel-header">
  <span class="mws-i-24 i-table-1">回收站</span>
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
      <tr class="gradeX even">
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
        <td>{!! isNew($book->is_new) !!}</td>
        <td>{!! isNew($book->is_hot) !!}</td>
        <td>{!! isNew($book->is_cheap) !!}</td>
        <td>{!! isNew($book->is_classics) !!}</td>
        <td>{!! isNew($book->status) !!}</td>
        <td>{{ $book->price }}</td>
        <td>
          <a style="text-decoration:none" href="{{ url('admin/book/back') }}/{{ $book->id }}">还原</a>
          <!-- <span>|</span> -->
          <!-- <a style="text-decoration:none" href="{{ url('admin/book/kill') }}/{{ $book->id }}">彻底删除</a> -->
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