<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index() {
        return 'Show form to collect input from user.';


    }

    public function getQuotes() {
        return 'Filter Quotes by user input und present them.';
    }
}
