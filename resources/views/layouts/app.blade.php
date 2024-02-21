<!DOCTYPE html>
<html lang="ja">

<head>
    <title>Task List App with Laravel10</title>
    @yield('styles')
</head>

<body>
    <h1>@yield('title')</h1>
    <div>
        @if(session()->has('success'))
        <div>{{session('success')}}</div>
        @endif

        @yield('content')
    </div>
</body>