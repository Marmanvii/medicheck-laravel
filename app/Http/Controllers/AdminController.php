<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Schedule;
use App\Department;

class AdminController extends Controller
{
     public function __construct() #Se utiliza el middleware para identificar usuarios activos en la sesión.
     {
         $this->middleware('auth');
     }
    public function index(){
      return view('admin.index');
    }
    public function select_area(){
      $departments = Department::all();
      return view('admin.select_area', compact('departments'));
    }
    public function select_medic(Request $request){
      $department = $request->department;
      $medics=User::select('id','name','last_name')->where('department_id', $department)->take(100)->get(); #Se seleccionan los medicos pertenecientes al hospital anteriormente seleccionado.
      $schedules=Schedule::All();
      return view('admin.select_medic', compact('medics', 'schedules'));
    }
}
