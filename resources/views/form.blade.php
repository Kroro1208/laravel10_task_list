@extends('layouts.app')

@section('title', isset($task) ? 'タスクを編集する' : 'タスクを追加する')

@section('content')
<form method="POST" action="{{isset($task) ? route('tasks.update', ['task'=>$task->id]) : route('tasks.store')}}">
    @csrf
    @isset($task)
    @method('PUT')
    @endisset

    <div class="mb-4">
        <label for="title">タスク名を入力</label>
        <input type="text" name="title" id="title" @class(["border-red-500"=>$errors->has('title')]) value="{{$task->title ?? old('title')}}" />
        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">タスクの概要と説明</label>
        <textarea name="description" id="description" @class(["border-red-500"=>$errors->has('description')]) rows="5">{{$task->description ?? old('description')}}</textarea>
        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="long_description">具体的なAction</label>
        <textarea name="long_description" id="long_description" @class(["border-red-500"=>$errors->has('long_description')]) rows="10">{{$task->long_description ?? old('long_description')}}</textarea>
        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="flex justify-between mt-8">
        <div>
            <button type="submit" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                {{isset($task) ? "更新する" : "追加する"}}</button>
        </div>
        <div>
            <a href="{{route('tasks.index')}}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center">
                タスク一覧へ戻る</a>
        </div>
    </div>
</form>
@endsection