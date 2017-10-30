@extends('layouts.master')

@section('title')
    Daily Quotes - Quote View
@endsection

@push('head')
    <link rel="stylesheet" href="/css/show.css" type="text/css">
@endpush

@section('content')

    <img id="author" src="{{$img}}" alt="">

    <h2>{{ $quote }}</h2>
    by {{$author}}


    <form action="/quote/pretend" method="get">
        <p>Put your own name below the quote:</p>
        <input type="text" name="username">
        <input type="hidden" name="quote_index" value="{{$index}}">
        <input type="submit">
    </form>


    @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
    @endif

    {{-- <a href="/quote/pretend/{{$index}}">Pretend</a>  --}}


@endsection
