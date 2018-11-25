@extends('layout.master')
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Seleccione tipo de usuario</h1>
  <h2 align="center">Seleccione el tipo de usuario que desea crear</h2>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
    <div class="card-body">
  <form action="/users/create" method="GET" style="text-align: center;width:80%; margin:0px auto;"><!--Luego en el controlador, con request se obtiene este dato-->
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="type">Tipo de Usuario</label>
        <select id="type" class="form-control" name="type" required>
          <option value="" disabled selected>Seleccione un tipo</option>
          <option value="medic">Médico</option>
          <option value="secre">Secretaria</option>
        </select>
      </div>
    </div>
  </div>
    <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
    <button type="submit" align="center"class="btn btn-primary">Ingresar</button>
  </form>
@include('layout.errors')
@endsection
