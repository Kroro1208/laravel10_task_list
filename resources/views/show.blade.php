@extends('layouts.app')

@section('title')
<h1 class="font-bold text-xl underline decoration-red-500">{{$task->title}}</h1>
<div class="flex flex-col items-end">
    <p class="mt-4 text-sm">作成日{{$task->created_at}}</p>
    <p class="mb-4 text-sm">更新日{{$task->updated_at}}</p>
    @section('content')
    <div class="mt-5 mb-5">
        <a href="{{route('tasks.index')}}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-4 py-2 text-center me-2 mb-2">
            タスク一覧へ戻る</a>
    </div>
</div>


<div class="mb-4">
    <a href="{{route('tasks.index')}}"></a>
</div>

<div class="mb-4">
    <p class="text-lg font-semibold">タスクの詳細</p>
    <p class="mb-4 text-slate-700">{{$task->description}}</p>
</div>


<div class="mb-4">
    <p class="text-lg font-semibold">具体的な行動</p>
    @if($task->long_description)
    <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif
</div>


<p class="mb-4">
    @if($task->completed)
    <span class="font-medium text-green-500">完了済みのタスクです</span>
    @else
    <span class="font-medium text-red-500">まだ終わってないよ!
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>

        </body>

        </html>
    </span>
    @endif
</p>


<div class="flex justify-between">
    <div class="flex items-center gap-5">
        <div>
            <a href="{{route('tasks.edit', ['task'=>$task])}}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm px-3 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                編集する</a>
        </div>
        <form method="POST" action="{{route('tasks.toggle-complete', ['task'=>$task])}}" class="mt-3">
            @csrf
            @method('PUT')
            <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm px-2.5 py-2 text-center dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                {{$task->completed ? '着手中にする' : 'タスク完了済みにする'}}</button>
        </form>
    </div>
    <div class="mt-5">
        <form method="POST" action="{{route('tasks.destroy', ['task'=>$task])}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2 text-center mb-2">
                削除する
            </button>
        </form>
    </div>
</div>