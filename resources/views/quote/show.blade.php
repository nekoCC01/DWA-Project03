@extends('layouts.master')

@section('title')
    Daily Quotes - Quote View
@endsection

@push('head')
    <link rel="stylesheet" href="/css/show.css" type="text/css">
@endpush

@section('content')

    <img id="author_img" src="{{$img}}" alt="">

    <p id="quote">{{ $quote }}</p>
    <p id="author_name">by {{$author}}</p>

    <form action="/quote/pretend" method="get">
        <fieldset>
            <legend>Pretend it´s yours</legend>

            <label for="username">Your name: <span>(required)</span></label><br>
            <input type="text" name="username" id="username">
            <br>
            @if(count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif

            <br>
            <input type="radio" name="gender" value="male" id="male" checked>
            <label for="male">Male</label>
            <br>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">Female</label>
            <br>
            <input type="hidden" name="quote_index" value="{{$index}}">
            <br>
            <input type="submit" value="Pretend">
        </fieldset>

    </form>

    <a class="button" href="javascript:history.back()">
        <button>Back</button>
    </a>
    <a class="button" href="/quote/random"><button>Another random quote</button></a>

@endsection
