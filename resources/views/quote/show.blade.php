@extends('layouts.master')

@section('title')
    Daily Quotes - Quote View
@endsection


@section('content')

    @if($quote)
        <h1>Show quote: {{ $quote }}</h1>
    @else
        <h1>No quote chosen</h1>
    @endif


    <p>{{$index}}</p>

    <a href="/quote/pretend/{{$index}}">Pretend</a>


@endsection
