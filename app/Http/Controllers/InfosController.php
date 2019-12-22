<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use File;
use Carbon\Carbon;

class InfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('infos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[ #Validaciones para los atributos
      'foto' => 'image|mimes:jpeg,jpg,png,gif|max:2048|required'
      ]);

          $foto = $request->file('foto');
          $extension = $foto->getClientOriginalExtension();
          $filename = 'infos-' . time() . '.' . $extension;
          $foto->move(public_path('images/infos'), $filename);
          
          $info = new Info;
          $info->titulo = request('titulo');
          $info->autor = request('autor');
          $info->cuerpo = request('cuerpo');
          $info->foto = 'images/infos/' . $filename;
          $info->fecha = date('Y-m-d H:i:s');

          $info->save();

        return redirect('/news');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::find($id);
        return view('infos.show', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
