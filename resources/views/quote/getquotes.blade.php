@extends('layouts.master')


@section('title')
    Show quote
@endsection


@push('head')
    <link href="/css/quote/show.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')
    @if($quote)
        <h1>Show quote: {{ $quote }}</h1>
    @else
        <h1>No quote chosen</h1>
    @endif
@endsection


@push('body')
    <script src="/js/quote/getquotes.js"></script>
@endpush