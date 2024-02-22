@extends('layouts.app')

@section('title', isset($task) ? 'タスクを編集する' : 'タスクを追加する')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
<form method="POST" action="{{isset($task) ? route('tasks.update', ['task'=>$task->id]) : route('tasks.store')}}">
    @csrf
    @isset($task)
    @method('PUT')
    @endisset

    <div>
        <label for="title">タスク名を入力</label>
        <input type="text" name="title" id="title" value="{{$task->title ?? old('title')}}" />
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">タスクの概要</label>
        <textarea name="description" id="description" rows="5">{{$task->description ?? old('description')}}</textarea>
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">タスクの概要</label>
        <textarea name="long_description" id="long_description" rows="10">{{$task->long_description ?? old('long_description')}}</textarea>
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">{{isset($task) ? "更新する" : "追加する"}}</button>
    </div>
</form>
@endsection