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

<div>
    <form method="POST" action="{{route('tasks.destroy', ['task'=>$task->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">削除する</button>
    </form>
</div>