<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

</html>