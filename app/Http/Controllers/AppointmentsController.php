<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Schedule;
use App\File;
use App\Medication;

class AppointmentsController extends Controller
{
     public function __construct() #Se utiliza el middleware para identificar usuarios activos en la sesión.
     {
         $this->middleware('auth');
     }
    public function index()    {
        $appointments = Appointment::all();
        $users = User::all();
        return view('appointments.index', compact('appointments','users'));
    }
    public function show(Appointment $appointment){
      return view('appointments.show', compact('appointment'));
    }
    public function create(Request $request){
      $users = User::all();
      return view('appointments.create', compact('users'));
    }
    public function store(){
      $this->validate(request(),[ #Validaciones para los atributos
      'fecha' => 'required|after_or_equal:today',
      'bloque' => 'required',
      'medics_id' => 'required',
      'patient_id' => 'required',
      'telefono' => 'required|max:16',
      'observacion' => 'required',
      ]);

          $appointment = new Appointment;
          $appointment->bloque = request('bloque');
          $appointment->fecha = request('fecha');
          $appointment->medics_id = request('medics_id');
          $appointment->patient_id = request('patient_id');
          $appointment->telefono = request('telefono');
          $appointment->observacion = request('observacion');

          $appointment->save(); #Se adquieren los atributos según el nombre asignado en la vista y se almacenan en la DB.

        return redirect('/appointments');
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
    public function medics_information(){
        $users = User::all();
        $schedules = Schedule::all();
        return view('appointments.medics_information', compact('schedules','users'));
    }

    public function medics_day(){
      $appointments = Appointment::all();
      $files = File::all();
      $users = User::all();
      return view('appointments.medics_day', compact('appointments','users', 'files'));
    }

    public function show_record(Request $request){
      $patient = $request->patient_id;
      $appointments = Appointment::all();
      $medications = Medication::all();
      $files = File::all();
      return view('appointments.record', compact('appointments','medications','files', 'patient'));
    }
}
