<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;

class SchedulesController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
      $medico = $request->medics_id;
      return view('schedules.create', compact('medico'));
    }

    public function store(Request $request)
    {
      $this->validate(request(),[ #Validaciones para los atributos
        'medics_id' => 'required',
        'lunes' => 'required',
        'martes' => 'required',
        'miercoles' => 'required',
        'jueves' => 'required',
        'viernes' => 'required',
        'duracion' => 'required',
      ]);
      
      $schedule = new Schedule;
      $schedule->medics_id = request('medics_id');
      $schedule->lunes = request('lunes');
      $schedule->martes = request('martes');
      $schedule->miercoles = request('miercoles');
      $schedule->jueves = request('jueves');
      $schedule->viernes = request('viernes');
      $schedule->duracion = request('duracion');

      $schedule->save();

      return redirect('/appointments');
    }
}
