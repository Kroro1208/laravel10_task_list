@extends('layouts.app')

@section('title', 'タスクを追加する')

@section('content')
{{$errors}}
<form method="POST" action="{{route('tasks.store')}}">
    @csrf
    <div>
        <label for="title">タスク名を入力</label>
        <input type="text" name="title" id="title" />
    </div>
    <div>
        <label for="description">タスクの概要</label>
        <textarea name="description" id="description" rows="5"></textarea>
    </div>
    <div>
        <label for="long_description">タスクの概要</label>
        <textarea name="long_description" id="long_description" rows="10"></textarea>
    </div>
    <div>
        <button type="submit">追加する</button>
    </div>
</form>
@endsection