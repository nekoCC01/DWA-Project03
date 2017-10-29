@extends('layouts.master')

@section('title')
    Daily Quotes - Quote View
@endsection

@push('head')
    <link rel="stylesheet" href="/css/pretend.css" type="text/css">
@endpush

@section('content')

    <p id="quote">{{$quote}}</p>
    <div id="img_container">
        <img src="/img/quotepretender.png" alt="">
        <p id="username">{!! $username !!} </p>
        <div id="author_img" style="background-image: url('{{$img}}');"></div>
    </div>



@endsection