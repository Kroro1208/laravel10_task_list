@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p>{{$task->description}}</p>

@if($task->long_Description)
<p>{{$task->long_Description}}</p>
@endif

