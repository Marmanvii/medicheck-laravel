<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waiting_List;

class Waiting_listsController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
      $cita_id = $request->cita_id;
      return view('waiting_lists.create', compact('cita_id'));
    }

    public function store(Request $request)
    {
      $this->validate(request(),[ #Validaciones para los atributos
      'appointment_id' => 'required',
      'patient_id' => 'required',
      'telefono' => 'required|max:16',
      'observacion' => 'required',
      ]);

      $waiting_list = new Waiting_List;
      $waiting_list->appointment_id = request('appointment_id');
      $waiting_list->patient_id = request('patient_id');
      $waiting_list->telefono = request('telefono');
      $waiting_list->observacion = request('observacion');

      $waiting_list->save();

      return redirect('/appointments');
    }
}
