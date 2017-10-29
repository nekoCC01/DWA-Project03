<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Debugbar;
use Wikidata\Wikidata;
use League\Csv\Reader;
use League\Csv\Writer;

class PracticeController extends Controller
{


    public function practice6()
    {

        $csvPath = database_path('quotes.csv');
        $csv     = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);
        $filtered_quotes = $csv->getRecords();

        $index = 32;
        $filtered_quotes = iterator_to_array($filtered_quotes);
        $author = $filtered_quotes[$index]['Autor'];
        dump($filtered_quotes[$index]['Wikidata-ID (Autor)']);

    }

    public function practice5()
    {
        $header  = ['first name', 'last name', 'email'];
        $records = [
                [1, 2, 3],
                ['boon', 'biz', 'bazi'],
                ['john', 'doe', 'john.doe@example.com'],
        ];

        $csvPath = database_path('filtered_quotes.csv');
        $writer = Writer::createFromPath($csvPath, 'w+');

        //insert the header
        $writer->insertOne($header);

        //insert all the records
        $writer->insertAll($records);

    }


    public function practice4()
    {
        $csvPath = database_path('quotes.csv');
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader(); //returns the CSV header record
        $records = $csv->getRecords(); //returns all the CSV records as an Iterator object

        foreach ($records as $record){
            dump($record);
        }
    }

    public function practice3()
    {
        $wikidata = new Wikidata();
        $results = $wikidata->search('London');
        dump($results);
    }

    public function practice2()
    {
        Debugbar::info('hello world');
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');

        return 'Practice 2';
    }

    public function practice1()
    {
        dump('This is the first example.');
    }

    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}
     *
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     *
     * http://foobooks.loc/practice/1 => Invokes practice1
     * http://foobooks.loc/practice/5 => Invokes practice5
     * http://foobooks.loc/practice/999 => Practice route [practice999] not defined
     */
    public function index($n = null)
    {
        # If no specific practice is specified, show index of all available methods
        if (is_null($n)) {
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    # Echo'ing display code from a controller is typically bad; making an
                    # exception here because:
                    # 1. This controller is for debugging/demonstration purposes only
                    # 2. This controller is introduced before we cover views
                    echo "<a href='" . str_replace('practice', '/practice/', $method) . "'>" . $method . "</a><br>";
                }
            }
            # Otherwise, load the requested method
        } else {
            $method = 'practice' . $n;
            if (method_exists($this, $method)) {
                return $this->$method();
            } else {
                dd("Practice route [{$n}] not defined");
            }
        }
    }
}



