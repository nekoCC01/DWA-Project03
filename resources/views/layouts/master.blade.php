<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title', 'DailyQuotes')
    </title>
    <link rel="stylesheet" href="/css/dailyquotes.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

    @stack('head')

</head>
<body>

<a href="/">
    <header>

        <span>Daily</span><img src="/img/DenkerProfil.jpg" alt=""><span>Quotes</span>

    </header>
</a>
<hr>
<main>
    @yield('content')
</main>


<footer>
    <hr>
    &copy; {{ date('Y') }}
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@stack('body')

</body>
</html>
