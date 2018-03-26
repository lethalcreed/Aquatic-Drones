<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $weather = Curl::to('http://weerlive.nl/api/json-10min.php?locatie=Rotterdam')->asJson()->get();
        $weather = ($weather->liveweer)[0];

        return view('home' , compact('weather'));
    }
}
