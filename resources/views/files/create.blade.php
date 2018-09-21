@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Registro de Consulta</h1>
  <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/medicfiles">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="diagnostico">Diagnóstico</label>
        <input type="textarea" class="form-control" id="diagnostico" name="diagnostico" required>
      </div>
      <div class="col" align="center">
        <div class="form-group col-md-8">
          <label for="descripcion">Descripción</label>
          <input type="textarea" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <div class="form-group col-md-8">
          <label for="tratamiento">Tratamiento</label>
          <input type="textarea" class="form-control" id="tratamiento" name="tratamiento" required>
        </div>
        <input name="id_appointment" type="hidden" value={{$id_appointment}}>
    </div>
      <button type="submit" align="center" class="btn">Registrar</button>
  </div>
  </form>
@include('layout.errors')
@endsection
