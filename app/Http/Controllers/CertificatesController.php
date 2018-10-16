<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Schedule;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function vender_bono(){
      return view('certificates.vender_bono');
    }
    public function results_search(Request $request){
      $rut = $request->rut;
      $appointments = Appointment::all();
      $user = User::select('id','rut')->where('rut', $rut)->take(100)->get();
      return view('certificates.results_search', compact('rut','appointments','user'));
    }
}
