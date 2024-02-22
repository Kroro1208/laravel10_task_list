<!DOCTYPE html>
<html lang="ja">

<head>
    <title>Task List App with Laravel10</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-2 text-semibold">@yield('title')</h1>
    @yield('button')
    <br>
    <div>
        @if(session()->has('success'))
        <div>{{session('success')}}</div>
        @endif

        @yield('content')
    </div>
</body>