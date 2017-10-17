@extends('layouts.master')

@section('title')
    Daily Quotes - Welcome
@endsection

@push('head')
    <link href="/css/welcome.css" type='text/css' rel='stylesheet'>
@endpush

@section('content')

    <ul>
        <li><a href="/quote">Show all quotes</a></li>
        <li><a href="/quote/random">Choose random quote</a></li>
    </ul>

@endsection