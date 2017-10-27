@extends('layouts.master')

@section('title')
    Daily Quotes - All quotes
@endsection


@section('content')



    <form method="GET" action="/quote">
        <fieldset>
            <legend>Language</legend>

            <input type="checkbox" name="language[]" value="EN">English <br>
            <input type="checkbox" name="language[]" value="DE">German <br>
            <input type="checkbox" name="language[]" value="FR">French <br>

        </fieldset>
        <fieldset>
            <legend>Category</legend>

            <input type="checkbox" name="category" value="Philosophy">Philosophy <br>
            <input type="checkbox" name="category" value="Politics">Politics <br>
            <input type="checkbox" name="category" value="Biographical">Biographical <br>

        </fieldset>
        <input type="submit" value="Apply Filter">
    </form>

    <p>{{old('language')}}</p>
    <a href="/quote/random">Random Quote</a>


    <h1>All quotes</h1>

    @foreach($quotes as $index => $quote)
        <div class="quote">
            <h3>{{$quote['Zitat']}}</h3>
            by {{$quote['Autor']}}
            <p>{{$index}}</p>
            <p>{{$loop->iteration}}</p>
        </div>
        <a href="/quote/{{$loop->iteration}}">Link zu Show</a>
    @endforeach

@endsection
