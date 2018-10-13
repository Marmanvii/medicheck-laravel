<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Schedule;

class AdminController extends Controller
{
     public function __construct() #Se utiliza el middleware para identificar usuarios activos en la sesión.
     {
         $this->middleware('auth');
     }
    public function index()    {
        return view('admin.index');
    }
    public function select_area()    {
        return view('admin.select_area');
    }
    public function select_medic(Request $request){
        $especialidad = $request->especialidad;
        $medics=User::select('id','name','last_name','especialidad')->where('especialidad', $especialidad)->take(100)->get(); #Se seleccionan los medicos pertenecientes al hospital anteriormente seleccionado.
        return view('admin.select_medic', compact('medics'));
    }    
}
