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
}
