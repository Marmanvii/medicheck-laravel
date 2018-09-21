<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medication;

class MedicationsController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Request $request)
    {
      $id_appointment = $request->appointment_id;
      return view('medications.create', compact('id_appointment'));
    }

    public function store(Request $request)
    {
      $this->validate(request(),[ #Validaciones para los atributos
      'nombre' => 'required',
      'intervalo' => 'required',
      'duracion' => 'required',
      ]);

          $medication = new Medication;
          $medication->appointment_id = request('id_appointment');
          $medication->nombre = request('nombre');
          $medication->intervalo = request('intervalo');
          $medication->duracion = request('duracion');

          $medication->save(); #Se adquieren los atributos según el nombre asignado en la vista y se almacenan en la DB.

        return redirect('/medic_day');
    }
}
