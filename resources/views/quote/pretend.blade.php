@extends('layouts.master')

@section('title')
    Daily Quotes - Quote View
@endsection


@section('content')

    <h3>{{$quote}}</h3>
    <p> by {{ $username  }} </p>


    <img src="/img/quotepretender.png" alt="">
    
    

@endsection