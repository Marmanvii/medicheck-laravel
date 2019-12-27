<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::orderBy('fecha', 'desc')->take(3)->get();
        return view('home.index', compact('infos'));
    }
}
