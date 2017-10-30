@extends('layouts.master')

@section('title')
    Daily Quotes - All quotes
@endsection

@push('head')
    <link rel="stylesheet" href="/css/index.css" type="text/css">
@endpush



@section('content')

    <form method="GET" action="/quote">
        <fieldset>
            <legend>Language</legend>

            <input type="checkbox" name="language[]" value="EN" {{ in_array('EN', $languages) ? 'checked' : '' }} >English <br>
            <input type="checkbox" name="language[]" value="DE" {{ in_array('DE', $languages) ? 'checked' : '' }} >German <br>
            <input type="checkbox" name="language[]" value="FR" {{ in_array('FR', $languages) ? 'checked' : '' }} >French <br>

        </fieldset>
        <fieldset>
            <legend>Category</legend>

            <input type="checkbox" name="category[]" value="Philosophy" {{ in_array('Philosophy', $categories) ? 'checked' : '' }} >Philosophy <br>
            <input type="checkbox" name="category[]" value="Daily Inspiration" {{ in_array('Daily Inspiration', $categories) ? 'checked' : '' }} >Daily Inspiration <br>
            <input type="checkbox" name="category[]" value="Politics" {{ in_array('Politics', $categories) ? 'checked' : '' }}>Politics <br>
            <input type="checkbox" name="category[]" value="Biographical" {{ in_array('Biographical', $categories) ? 'checked' : '' }}>Biographical <br>

        </fieldset>
        <input type="submit" value="Apply Filter">
    </form>

    <a href="/quote/random">Random Quote</a>


    <h1>All quotes</h1>

    @foreach($quotes as $index => $quote)
        <div class="quote">
            <h3>{{$quote['Zitat']}}</h3>
            by {{$quote['Autor']}}
        </div>
        <p><a href="/quote/{{$loop->iteration}}">Detail View</a></p>
        <hr>

    @endforeach

@endsection
