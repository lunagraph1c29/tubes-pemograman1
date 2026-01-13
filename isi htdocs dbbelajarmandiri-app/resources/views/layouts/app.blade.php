<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-white p-4 shadow">
        <a href="/dashboard">Dashboard</a> |
        <a href="/materi">Materi</a> |
        <form method="POST" action="/logout" class="inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <div class="p-6">
        @yield('content')
    </div>
</body>
</html>
