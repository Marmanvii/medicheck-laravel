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
    public function __construct(){ #Se utiliza el middleware para identificar usuarios activos en la sesión.
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
      $medico = $request->medics_id;
      $fecha = $request->fecha;
      $bloque = $request->bloque;
      return view('appointments.create', compact('medico','fecha','bloque'));
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
    public function select_area(Request $request){
      $medics=User::select('especialidad')->where('type', 'medic')->take(100)->get(); #Se seleccionan los medicos pertenecientes al hospital anteriormente seleccionado.
      return view('appointments.select_area', compact('medics'));
    }
    public function select_fecha_medico(Request $request){#Seleccionamos una fecha y medico
      $especialidad = $request->especialidad;
      $medics=User::select('id','name','last_name','especialidad')->where('especialidad', $especialidad)->take(100)->get(); #Se seleccionan los medicos pertenecientes al hospital anteriormente seleccionado.
      return view('appointments.select_fecha_medico', compact('medics'));
    }
    public function bloques_disponibles(Request $request){
      $medico = $request->medics_id;
      $fecha = $request->fecha;
      $appointments = Appointment::all();
      $bloque_1 = Appointment::where('bloque','1')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_2 = Appointment::where('bloque','2')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_3 = Appointment::where('bloque','3')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_4 = Appointment::where('bloque','4')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_5 = Appointment::where('bloque','5')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_6 = Appointment::where('bloque','6')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_7 = Appointment::where('bloque','7')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_8 = Appointment::where('bloque','8')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_9 = Appointment::where('bloque','9')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_10 = Appointment::where('bloque','10')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_11 = Appointment::where('bloque','11')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_12 = Appointment::where('bloque','12')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      $bloque_13 = Appointment::where('bloque','13')->where('fecha',$fecha)->where('medics_id',$medico)->count();
      return view('appointments.bloques_disponibles', compact('medico','fecha','bloque_1','bloque_2','bloque_3','bloque_4','bloque_5','bloque_6','bloque_7','bloque_8','bloque_9','bloque_10','bloque_11','bloque_12','bloque_13'));
    }
}
