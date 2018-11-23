<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
}
