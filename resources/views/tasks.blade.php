@extends('layout')
@section('content')
<h1>タスク管理</h1>
<form action="/tasks" method="POST" class="form-horizontal">
  {{ csrf_field() }}
  <div class="form-group">
  <label for="task-name" class="col-sm-3 control-label">タスク追加</label>
  <div class="col-sm-6">
  <input type="text" name="name" id="task-name">
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">
        <i class="fa fa-plus"></i>追加
      </button>
    </div>
  </div>
</form>

<h2>抱えているタスク</h2>

<table class="table table-striped task-table">
  <thead>
    <th>タスク</th><th>&nbsp;</th>
  </thead>
  <tbody>
    @foreach($tasks as $task)
  <tr>
    <td>
    {{$task->name}}
    </td>
    <td>
    <form action="/tasks/{{$task->id}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button>削除</button>
    </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>

@endsection