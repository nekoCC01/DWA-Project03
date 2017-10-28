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

    <form action="/quote/pretend" method="get">
        <input type="text" name="username">
        <input type="hidden" name="quote_id" value="{{$index}}">
        <input type="submit">
    </form>

    {{-- <a href="/quote/pretend/{{$index}}">Pretend</a>  --}}





@endsection
