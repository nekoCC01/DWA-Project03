<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wikidata\Wikidata;
use League\Csv\Reader;

class QuoteController extends Controller
{

    private $quotes;
    private $filtered = array();

    public function __construct()
    {
        $csvPath = database_path('quotes.csv');
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);
        $this->quotes = $csv->getRecords(); //returns all the CSV records as an Iterator object
    }


    //show all quotes, offer a form to filter
    public function index(Request $request)
    {
        dump($request->has('language'));

        $filtered = iterator_to_array($this->quotes);

        if ($request->has('language'))
        {
            $languages = $request->only('language');
            dump($filtered);

            foreach ($filtered as $i => $quote)
            {
                if (!in_array($quote['Sprache Zitat'], $languages['language']))
                {
                    unset($filtered[$i]);
                }
            }
        }
        dump($filtered);


        return view('quote.index')->with([
                'quotes' => $filtered
        ]);
    }

    //show one quote, either random or selected
    public function show($quote)
    {
        return view('quote.show')->with(['quote' => $quote]);
    }


    public function pretend(){

    }

}
