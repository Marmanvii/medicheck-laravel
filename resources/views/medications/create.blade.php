@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Registro de Medicamentos</h1>
  <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/medicmedications">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="nombre">Nombre</label>
        <input type="textarea" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="col" align="center">
        <div class="form-group col-md-8">
          <label for="intervalo">Intervalo</label>
          <input type="textarea" class="form-control" id="intervalo" name="intervalo" required>
        </div>
        <div class="form-group col-md-8">
          <label for="duracion">Duración</label>
          <input type="textarea" class="form-control" id="duracion" name="duracion" required>
        </div>
        <input name="id_appointment" type="hidden" value={{$id_appointment}}>
    </div>
      <button type="submit" align="center" class="btn">Registrar</button>
  </div>
  </form>
@include('layout.errors')
@endsection
