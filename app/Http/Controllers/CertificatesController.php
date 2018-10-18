<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\Appointment;
use App\User;
use App\Schedule;

class CertificatesController extends Controller
{

    public function create(Request $request){
        $id_cita = $request->appointment_id;
        return view('certificates.create', compact('id_cita'));
    }

    public function store(){
      $this->validate(request(),[ #Validaciones para los atributos
      'fecha' => 'required|after_or_equal:today',
      'appointment_id' => 'required',
      'medio_pago' => 'required',
      ]);
      try{
          $certificate = new Certificate;
          $certificate->medio_pago = request('medio_pago');
          $certificate->fecha = request('fecha');
          $certificate->appointment_id = request('appointment_id');

          $certificate->save(); #Se adquieren los atributos según el nombre asignado en la vista y se almacenan en la DB.
        }
        catch(\Exception $e){
          return back()->withErrors(['La cita acaba de ser tomada por alguien más.']); #Se obtienen los errores provenientes de la DB para ser mostrados como un error dentro de la vista.
        }
        return redirect('/appointments');
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
