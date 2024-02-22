@extends('layouts.app')

@section('title')
<h1>{{$task->title}}</h1>

@section('content')
<p>{{$task->description}}</p>

@if($task->long_description)
<p>{{$task->long_description}}</p>
@endif


<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

<p>
    @if($task->completed)
    完了済みのタスクです
    @else
    着手中のタスクです
    @endif
</p>

<div>
    <form method="GET" action="{{route('tasks.edit', ['task'=>$task])}}">
        <button type="submit">編集する</button>
    </form>
</div>

<form method="POST" action="{{route('tasks.toggle-complete', ['task'=>$task])}}">
    @csrf
    @method('PUT')
    <button type="submit">
        {{$task->completed ? '着手中にする' : 'タスク完了!!'}}
    </button>
</form>

<div>
    <form method="POST" action="{{route('tasks.destroy', ['task'=>$task])}}">
        @csrf
        @method('DELETE')
        <button type="submit">削除する</button>
    </form>
</div>

<a href="/">タスク一覧へ戻る</a>