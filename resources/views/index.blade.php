@extends('layouts.app')

@section('title', 'There are my Tasks!')
@section('button')
<form method="GET" action="{{route('create')}}">
    <button type="submit">タスクを追加する</button>
</form>
@endsection

@section('content')
@forelse($tasks as $task)
<div>
    <a href="{{route('tasks.show', ['task'=>$task->id])}}">{{$task->title}}</a>
</div>
@empty
<div>There are no tasks!</div>
@endforelse

@if($task->count())
<nav>
    {{$tasks->links()}}
</nav>
@endif
@endsection