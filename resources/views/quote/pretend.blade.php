@extends('layouts.master')

@section('title')
    Daily Quotes - Quote View
@endsection

@push('head')
    <link rel="stylesheet" href="/css/pretend.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <style>
        #author_img {
            background-image: url('{{$img_author}}');
        }
    </style>
@endpush

@section('content')

    <p id="quote">{{$quote}}</p>
    <div id="img_container">
        <img src="/img/{{$img_pretender}}" alt="">
        <p id="username">
            by<br>
            @foreach ($username as $name_part)
                {{$name_part}}<br>
            @endforeach
        </p>
        <div id="author_img"></div>

    </div>

    <a class="button" href="javascript:history.back()">
        <button>Back</button>
    </a>

@endsection