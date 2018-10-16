<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
      return view('departments.create');
    }

    public function store(Request $request)
    {
      $this->validate(request(),[ #Validaciones para los atributos
      'department' => 'required|unique:departments',
      ]);

          $Department = new Department;
          $Department->department = request('department');

          $Department->save();

        return redirect('/appointments');
    }
}
