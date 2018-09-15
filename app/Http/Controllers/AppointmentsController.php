<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
     public function __construct() #Se utiliza el middleware para identificar usuarios activos en la sesión.
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments');
    }
    public function show(Appointment $appointment){
      return view('appointments.show', compact('appointment'));
    }
    public function create(Request $request){
      $medico = $request->medics_id;
      $fecha = $request->fecha;
      $bloque = $request->bloque;
      return view('appointments.create', compact('medico','fecha','bloque'));
    }
    public function store(){
      $this->validate(request(),[ #Validaciones para los atributos
      'patient_rut' => 'required|max:255|cl_rut', #cl_rut es una función adquirida con composer para validar RUT
      'fecha' => 'required|after_or_equal:today',
      'bloque' => 'required',
      'medics_id' => 'required',
      'patient_id' => 'required',
      'telefono' => 'required|max:16',
      'observacion' => 'required',
      ]);
    }
    public function destroy($id)
    {
        $appointment = \App\Appointment::find($id);
        $appointment->delete();
        return redirect('appointments');
    }
    public function edit($id){
      $appointments = Appointment::all();
      return view('appointments.edit', compact('appointments'));
    }
    public function update(Request $request, $id){
      $appointments = \App\Appointment::find($id);
      $appointments->id = request('id');
      $appointments->patient_rut = request('patient_rut');
      $appointments->fecha = request('fecha');
      $appointments->bloque = request('bloque');
      $appointments->medics_id = request('medics_id');
      $appointments->observacion = request('observacion');
      $appointments->telefono = request('telefono');
      $appointments->patient_id = request('patient_id');
      $appointments->save();

      return redirect('/appointments');
    }
}