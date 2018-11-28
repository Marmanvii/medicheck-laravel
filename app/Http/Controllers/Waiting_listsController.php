<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waiting_List;
use App\Appointment;
use App\User;

class Waiting_listsController extends Controller
{
    public function __construct() #Se utiliza el middleware para identificar usuarios activos en la sesión.
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $cita_id = $request->appointment_id;
        $inicio = $request->hora_inicio;
        $final = $request->hora_final;
        $waiting_list = Waiting_List::All();
        $users = User::All();
        return view('waiting_lists.index', compact('cita_id', 'waiting_list', 'inicio', 'final', 'users'));
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
