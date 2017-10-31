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
            <legend>Filter</legend>

            <fieldset>
                <legend>Language</legend>
                <input type="checkbox" name="language[]" value="EN"
                       id="EN" {{ in_array('EN', $languages) ? 'checked' : '' }} >
                <label for="EN">English</label>
                <br>
                <input type="checkbox" name="language[]" value="DE"
                       id="DE" {{ in_array('DE', $languages) ? 'checked' : '' }} >
                <label for="DE">German</label>
                <br>
                <input type="checkbox" name="language[]" value="FR"
                       id="FR"{{ in_array('FR', $languages) ? 'checked' : '' }} >
                <label for="FR">French</label>
                <br>
            </fieldset>


            <fieldset>
                <legend>Category</legend>
                <input type="checkbox" name="category[]" value="Philosophy"
                       id="Philosophy" {{ in_array('Philosophy', $categories) ? 'checked' : '' }} >
                <label for="Philosophy">Philosophy</label>
                <br>
                <input type="checkbox" name="category[]" value="Daily Inspiration"
                       id="Daily_Inspiration" {{ in_array('Daily Inspiration', $categories) ? 'checked' : '' }} >
                <label for="Daily_Inspiration">Daily Inspiration</label>
                <br>
                <input type="checkbox" name="category[]" value="Politics"
                       id="Politics" {{ in_array('Politics', $categories) ? 'checked' : '' }}>
                <label for="Politics">Politics</label>
                <br>
                <input type="checkbox" name="category[]" value="Biographical"
                       id="Biographical" {{ in_array('Biographical', $categories) ? 'checked' : '' }}>
                <label for="Biographical">Biographical</label>
            </fieldset>
            <br>
            <input type="submit" value="Apply Filter">

        </fieldset>

    </form>

    <a class="button" href="/quote/random">Random Quote </a>


    <h1>All quotes</h1>

    @foreach($quotes as $index => $quote)
        <div class="quote">
            <p>{{$quote['Zitat']}}</p>
            by {{$quote['Autor']}}
        </div>
        <p><a href="/quote/{{$loop->iteration}}">Detail View</a></p>
        <hr>
    @endforeach

@endsection
