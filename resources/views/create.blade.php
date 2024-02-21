@extends('layouts.app')

@section('title', 'タスクを追加する')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
<form method="POST" action="{{route('tasks.store')}}">
    @csrf
    <div>
        <label for="title">タスク名を入力</label>
        <input type="text" name="title" id="title" />
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">タスクの概要</label>
        <textarea name="description" id="description" rows="5"></textarea>
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">タスクの概要</label>
        <textarea name="long_description" id="long_description" rows="10"></textarea>
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">追加する</button>
    </div>
</form>
@endsection