
@extends('layouts.master')


@section('title')
    All quotes
@endsection


@section('content')
    <h1>All quotes</h1>

    @foreach($quotes as $quote)
        <div class="quote">
            <h3>{{$quote['quote']}}</h3>
            by {{$quote['author']}}
        </div>
    @endforeach

@endsection
