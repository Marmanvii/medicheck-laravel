<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Schedule;
use App\File;
use App\Medication;
use App\Department;
use App\Waiting_List;

class AppointmentsController extends Controller
{
    public function __construct(){ #Se utiliza el middleware para identificar usuarios activos en la sesión.
         $this->middleware('auth');
    }
    public function index()    {
        $appointments = Appointment::all();
        $schedules = Schedule::all();
        $users = User::all();
        return view('appointments.index', compact('appointments','users','schedules'));
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
      try
      {
          $appointment = new Appointment;
          $appointment->bloque = request('bloque');
          $appointment->fecha = request('fecha');
          $appointment->medics_id = request('medics_id');
          $appointment->patient_id = request('patient_id');
          $appointment->telefono = request('telefono');
          $appointment->observacion = request('observacion');

          $appointment->save(); #Se adquieren los atributos según el nombre asignado en la vista y se almacenan en la DB.
        }
        catch(\Exception $e)
        {
          return back()->withErrors(['La cita acaba de ser tomada por alguien más.']); #Se obtienen los errores provenientes de la DB para ser mostrados como un error dentro de la vista.
        }
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
    public function wait_list_to_appointment(Request $request, $id){
      $appointments = Appointment::find($id);
      $appointments->patient_id = request('patient_id');
      $appointments->observacion = request('observacion');
      $appointments->telefono = request('telefono');
      $appointments->save();

      $waiting_list = Waiting_List::find(request('waiting_list_id'));
      $waiting_list->delete();

      return redirect('/appointments');
    }
    public function medics_information(){
        $users = User::all();
        $schedules = Schedule::all();
        $departments = Department::all();
        return view('appointments.medics_information', compact('schedules','users', 'departments'));
    }
    public function medics_day(){
      $appointments = Appointment::all();
      $files = File::all();
      $users = User::all();
      $schedules = Schedule::all();
      return view('appointments.medics_day', compact('appointments','users', 'files','schedules'));
    }
    public function show_record(Request $request){
      $patient = $request->patient_id;
      $appointments = Appointment::all();
      $medications = Medication::all();
      $files = File::all();
      return view('appointments.record', compact('appointments','medications','files', 'patient'));
    }
    public function select_area(Request $request){
      $departments = Department::all();
      return view('appointments.select_area', compact('departments'));
    }
    public function select_medico(Request $request){#Seleccionamos una fecha y medico
      $department = $request->department;
      $medics=User::select('id','name','last_name')->where('department_id', $department)->take(100)->get(); #Se seleccionan los medicos pertenecientes al hospital anteriormente seleccionado.
      return view('appointments.select_medico', compact('medics'));
    }
    public function select_fecha(Request $request){#Seleccionamos una fecha y medico
      $medic=$request->medics_id;
      $schedules= Schedule::where('medics_id', $medic)->take(100)->get();
      return view('appointments.select_fecha', compact('schedules', 'medic'));
    }
    public function bloques_disponibles(Request $request){
      $medico = $request->medics_id;
      $fecha = $request->fecha;
      $appointments = Appointment::all();
      $schedules = Schedule::where('medics_id', $medico)->take(100)->get();
      return view('appointments.bloques_disponibles', compact('medico','fecha','appointments','schedules'));
    }
    public function next_day(){
      $appointments = Appointment::all();
      $users = User::all();
      $schedules = Schedule::all();
      return view('appointments.next_day', compact('appointments', 'users', 'schedules'));
    }


}
