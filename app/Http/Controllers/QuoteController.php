<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wikidata\Wikidata;
use League\Csv\Reader;
use League\Csv\Writer;

class QuoteController extends Controller
{

    private $all_quotes;
    private $filtered_quotes;
    private $header;

    public function __construct()
    {
        $csvPath = database_path('quotes.csv');
        $csv     = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);
        $this->all_quotes = $csv->getRecords();

        $this->header = $csv->getHeader();

        $csvPath = database_path('filtered_quotes.csv');
        $csv     = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);
        $this->filtered_quotes = $csv->getRecords();

    }


    //show all quotes, filter according to form input
    public function index(Request $request)
    {

        dump($request->session()->all());
        dump(old('language'));

        $filtered_quotes = iterator_to_array($this->all_quotes);

        if ($request->has('language')) {

            $languages = $request->only('language');
            foreach ($filtered_quotes as $i => $quote) {
                if ( ! in_array($quote['Sprache Zitat'], $languages['language'])) {
                    unset($filtered_quotes[$i]);
                }
            }
        }

        //Write filtered quotes to file, so that it will be available to other pages
        $csvPath = database_path('filtered_quotes.csv');
        $writer  = Writer::createFromPath($csvPath, 'w+');
        $writer->insertOne($this->header);
        $writer->insertAll($filtered_quotes);

        dump($filtered_quotes);

        return view('quote.index')->with([
                'quotes' => $filtered_quotes
        ]);
    }

    //show one single quote, either random or selected
    public function show($quote)
    {
        $filtered_quotes    = iterator_to_array($this->filtered_quotes);
        dump($filtered_quotes);

        $output = '';
        if ($quote == 'random') {

            $random_quote_index = array_rand($filtered_quotes);

            $output = $filtered_quotes[$random_quote_index]['Zitat'];
            $index = $random_quote_index;

        } else {

            $output = $filtered_quotes[$quote]['Zitat'];;
            $index = $quote;
        }

        return view('quote.show')->with(
                [
                        'quote' => $output,
                        'index' => $index
                ]
        );
    }


    public function pretend($quote)
    {
        $filtered_quotes    = iterator_to_array($this->filtered_quotes);
        dump($filtered_quotes[$quote]);

        return view('quote.pretend')->with(['quote' => $quote]);
    }

}
