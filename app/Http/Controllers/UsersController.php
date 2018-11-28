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

class UsersController extends Controller
{
    public function __construct() #Se utiliza el middleware para identificar usuarios activos en la sesión.
    {
        $this->middleware('auth');
    }
    public function select_type(){ #Seleccionamos el tipo de usuario que queremos crear
      return view('users.select_type');
    }

    public function create(Request $request){
      $type = $request->type;
      $departments = Department::all();
      return view('users.create', compact('type','departments'));
    }
    public function store(){
      $this->validate(request(),[ #Validaciones para los atributos
      'rut' => 'required|cl_rut',
      'name' => 'required',
      'last_name' => 'required',
      'email' => 'required',
      'type' => 'required',
      'password' => 'required',
      ]);
      try
      {
          $user = new User;
          $user->rut = request('rut');
          $user->name = request('name');
          $user->last_name = request('last_name');
          $user->department_id = request('department_id');
          $user->email = request('email');
          $user->type = request('type');
          $user->password = bcrypt(request('password'));
          $user->valor = request('valor');

          $user->save(); #Se adquieren los atributos según el nombre asignado en la vista y se almacenan en la DB.
        }
        catch(Exception $e)
        {
          return back()->withErrors([$e]); #Se obtienen los errores provenientes de la DB para ser mostrados como un error dentro de la vista.
        }
        return redirect('/appointments');
    }
}
