@extends('layouts.master')

@section('title')
    Daily Quotes - Quote View
@endsection

@push('head')
    <link rel="stylesheet" href="/css/pretend.css" type="text/css">
    <style>
        #author_img {
            background-image: url('{{$img}}');
        }
    </style>
@endpush

@section('content')

    <p id="quote">{{$quote}}</p>
    <div id="img_container">
        <img src="/img/quotepretender.png" alt="">
        {{-- <p id="username">{!! $username !!} </p> --}}
        <p id="username">
            @foreach ($username as $name_part)
                {{$name_part}}<br>
            @endforeach
        </p>
        {{-- <div id="author_img" style="background-image: url('{{$img}}');"></div> --}}
        <div id="author_img"></div>

    </div>

@endsection