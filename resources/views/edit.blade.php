@extends('layouts.app')

@section('title', 'タスクを編集する')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
<form method="POST" action="{{route('tasks.update', ['id'=>$task->id])}}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">タスク名を入力</label>
        <input type="text" name="title" id="title" value="{{$task->title}}" />
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">タスクの概要</label>
        <textarea name="description" id="description" rows="5">value="{{$task->description}}"</textarea>
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">タスクの概要</label>
        <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">更新する</button>
    </div>
</form>
@endsection