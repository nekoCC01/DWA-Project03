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
        /*
         * Filter quotes according to form input
         */
        //start with all quotes
        $filtered_quotes = iterator_to_array($this->all_quotes);

        $languages['language'] = array();
        //filter by language
        if ($request->has('language')) {
            $languages = $request->only('language');
            foreach ($filtered_quotes as $i => $quote) {
                if ( ! in_array($quote['Sprache Zitat'], $languages['language'])) {
                    unset($filtered_quotes[$i]);
                }
            }
        }

        $categories['category'] = array();
        //filter by category
        if ($request->has('category')) {
            $categories = $request->only('category');
            foreach ($filtered_quotes as $i => $quote) {
                if ( ! in_array($quote['Kategorie'], $categories['category'])) {
                    unset($filtered_quotes[$i]);
                }
            }
        }

        //Write filtered quotes to file, so that it will be available to other pages
        $csvPath = database_path('filtered_quotes.csv');
        $writer  = Writer::createFromPath($csvPath, 'w+');
        $writer->insertOne($this->header);
        $writer->insertAll($filtered_quotes);

        return view('quote.index')->with([
                'quotes'     => $filtered_quotes,
                'languages'  => $languages['language'],
                'categories' => $categories['category']
        ]);
    }

    //show one single quote, either random or selected
    public function show($quote_index)
    {
        //get all (filtered) quotes, if no filter is applied the array will contain all quotes (__construct)
        $filtered_quotes = iterator_to_array($this->filtered_quotes);

        if ($quote_index == 'random') {
            $index = array_rand($filtered_quotes);

        } else {
            $index = $quote_index;
        }

        //get quote & author by index
        $quote  = $filtered_quotes[$index]['Zitat'];
        $author = $filtered_quotes[$index]['Autor'];

        $img = $this->getWikidataImg($index, $filtered_quotes);


        return view('quote.show')->with(
                [
                        'quote'  => $quote,
                        'author' => $author,
                        'index'  => $index,
                        'img'    => $img[0]
                ]
        );
    }


    public function pretend(Request $request)
    {

        $this->validate($request, [
                'username' => 'required|min:3|alpha_spaces',
        ]);

        //get form data: username and hidden quote-index
        $username = $request->input('username');
        //$username = preg_replace("/\s+/", "<br>", $username);
        $username = preg_split("/\s+/", $username);

        $index = $request->input('quote_index');

        //get quote by index
        $filtered_quotes = iterator_to_array($this->filtered_quotes);
        $quote           = $filtered_quotes[$index]['Zitat'];

        $img = $this->getWikidataImg($index, $filtered_quotes);

        return view('quote.pretend')->with(
                [
                        'username' => $username,
                        'quote'    => $quote,
                        'img'      => $img[0]
                ]
        );
    }

    private function getWikidataImg($index, $filtered_quotes)
    {
        //fallback img
        $img    = array();
        $img[0] = "http://via.placeholder.com/300x150";

        //img from wikidata, if available
        if ($filtered_quotes[$index]['Wikidata-ID (Autor)'] != '') {
            $wikidata = new Wikidata();
            $entity   = $wikidata->get($filtered_quotes[$index]['Wikidata-ID (Autor)']);
            if (in_array("image", $entity->properties)) {
                $img = $entity->get("image");
            }
        }

        return $img;
    }


}
