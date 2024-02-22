@extends('layouts.app')

@section('title', 'There are my Tasks!')
@section('button')

<nav class="mt-5">
    <a href="{{route('create')}}" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        タスクを追加する</a>
</nav>

@endsection

@section('content')
@forelse($tasks as $task)
<div>
    <a href="{{route('tasks.show', ['task'=>$task->id])}}" @class(['line-through'=>$task->completed])>
        {{$task->title}}</a>
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