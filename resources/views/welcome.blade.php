@extends('layouts.master')

@section('title')
    Daily Quotes - Welcome
@endsection

@push('head')
    <link href="/css/welcome.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')

    <div id="quote_presentation">
        <div class="parallax">
            <h1>Welcome to the wonderful world of quotes!</h1>
            <h2>You may browse all quotes or choose a random one</h2>
        </div>

    </div>

    <a class="button" href="/quote">
        <button>Show all quotes</button>
    </a>
    <a class="button" href="/quote/random">
        <button>Random Quote</button>
    </a>

@endsection