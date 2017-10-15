<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index() {
        $jsonPath = database_path('quotes.json');
        $quotesJson = file_get_contents($jsonPath);
        $quotes_array = json_decode($quotesJson, true);
        $quotes = $quotes_array['quotes'];
        return view('quote.index')->with([
                'quotes' => $quotes
        ]);
    }

    public function getQuotes($quote) {
        return view('quote.getquotes')->with(['quote' => $quote]);
    }
}
