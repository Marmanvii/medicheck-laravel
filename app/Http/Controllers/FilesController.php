<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FilesController extends Controller
{
    public function __construct() #Se utiliza el middleware para identificar usuarios activos en la sesión.
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
      $id_appointment = $request->appointment_id;
      return view('files.create', compact('id_appointment'));
    }

    public function store(Request $request)
    {
      $this->validate(request(),[ #Validaciones para los atributos
      'descripcion' => 'required',
      'tratamiento' => 'required',
      'diagnostico' => 'required',
      ]);

          $file = new File;
          $file->appointment_id = request('id_appointment');
          $file->descripcion = request('descripcion');
          $file->tratamiento = request('tratamiento');
          $file->diagnostico = request('diagnostico');

          $file->save(); #Se adquieren los atributos según el nombre asignado en la vista y se almacenan en la DB.

        return redirect('/medic_day');
    }
}
