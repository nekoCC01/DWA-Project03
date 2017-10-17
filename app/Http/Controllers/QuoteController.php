<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    //show all quotes, offer a form to filter
    public function index()
    {
        $jsonPath     = database_path('quotes.json');
        $quotesJson   = file_get_contents($jsonPath);
        $quotes_array = json_decode($quotesJson, true);
        $quotes       = $quotes_array['quotes'];

        return view('quote.index')->with([
                'quotes' => $quotes
        ]);
    }

    //show one quote, either random or selected
    public function show($quote)
    {
        return view('quote.show')->with(['quote' => $quote]);
    }
}
