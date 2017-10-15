<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title', 'DailyQuotes')
    </title>
    <link rel="stylesheet" href="/css/dailyquotes.css" type="text/css">

    @stack('head')

</head>
<body>

<header>

</header>

<main>
    @yield('content')
</main>

<footer>
    &copy; {{ date('Y') }}
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@stack('body')

</body>
</html>
