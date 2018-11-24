<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Appointment;
use PDF;


class ReportController extends Controller
{
  public function ViewUsersReport() // Función de ejemplo para uso de PDF
    {
      $users = User::all(); //Cargo la tabla usuarios
      return view('PDF.ShowUsersReport', compact('users'));
  }
  public function DownloadUsersReport() // Función de ejemplo para uso de PDF
    {
      $users = User::all(); //Cargo la tabla usuarios
      $pdf = PDF::loadView('PDF.UsersReport', compact('users')); // creo un PDF que contenga la información de la vista UsersReport en la carpeta PDF y le paso la información de users
      return $pdf->download('users.pdf'); // descargo el PDF generado
  }

  public function select_area(Request $request){
    $departments = Department::all();
    return view('PDF.select_area', compact('departments'));
  }

  public function select_medic(Request $request){#Seleccionamos una fecha y medico
    $department = $request->department;
    $medics=User::select('id','name','last_name')->where('department_id', $department)->get(); #Se seleccionan los medicos pertenecientes al hospital anteriormente seleccionado.
    return view('PDF.select_medic', compact('medics'));
  }

  public function select_fecha_inicial(Request $request){#Seleccionamos una fecha y medico
    $medic = $request->medics_id;
    return view('PDF.select_fecha_inicial', compact('medic'));
  }

  public function select_fecha_final(Request $request){#Seleccionamos una fecha y medico
    $medic = $request->medics_id;
    $fecha_inicial = $request->fecha_inicial;
    return view('PDF.select_fecha_final', compact('medic', 'fecha_inicial'));
  }

  public function view_ingresos(Request $request){
    $medic = $request->medics_id;
    $inicial = $request->fecha_inicial;
    $final = $request->fecha_final;
    $appointments = Appointment::where('medics_id', $medic)->get();
    $user = User::where('id', $medic)->get();
    return view('PDF.show_ingresos', compact('appointments', 'inicial', 'final', 'user', 'medic'));
  }

  public function download_medics_report(Request $request){
    $medic = $request->medics_id;
    $inicial = $request->fecha_inicial;
    $final = $request->fecha_final;
    $appointments = Appointment::where('medics_id', $medic)->get();
    $user = User::where('id', $medic)->get();
    $pdf = PDF::loadView('PDF.medics_report', compact('appointments', 'inicial', 'final', 'user', 'medic'));
    return $pdf->download('medics.pdf'); // descargo el PDF generado
  }

  public function select_fecha_inicio_hospital(){
    return view('PDF.select_fecha_inicio_hospital');
  }

  public function select_fecha_final_hospital(Request $request){#Seleccionamos una fecha y medico
    $fecha_inicial = $request->fecha_inicial;
    return view('PDF.select_fecha_final_hospital', compact('fecha_inicial'));
  }

  public function view_ingresos_hospital(Request $request){
    $inicial = $request->fecha_inicial;
    $final = $request->fecha_final;
    $appointments = Appointment::all();
    $users = User::all();
    return view('PDF.show_ingresos_hospital', compact('appointments', 'inicial', 'final', 'users'));
  }

  public function download_hospital_report(Request $request){
    $inicial = $request->fecha_inicial;
    $final = $request->fecha_final;
    $appointments = Appointment::all();
    $users = User::all();
    $pdf = PDF::loadView('PDF.hospital_report', compact('appointments', 'inicial', 'final', 'users'));
    return $pdf->download('hospital.pdf'); // descargo el PDF generado
  }


}
