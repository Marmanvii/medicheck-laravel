@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Registrar cita</h1>
  <h2 align="center">Seleccione su médico y fecha deseada</h2>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
    <div class="card-body">
  <form action="/appointments/bloques_disponibles" method="GET" style="text-align: center;width:80%; margin:0px auto;"><!--Luego en el controlador, con request se obtiene este dato-->
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="telefono">Médico</label>
        <select id="medics_id" class="form-control" name="medics_id" required>
          <option value="" disabled selected>Seleccione un médico</option>
          @foreach($medics as $medic) <!--Función de laravel, se busca por fila de la tabla, adquiriendo un medico y sus datos por ciclo, se obtiene desde el controlador, "as" sirve a modo de alias-->
              <option value="{{$medic->id}}">{{$medic->name}} {{$medic->last_name}}: {{$medic->especialidad}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="telefono">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" min="<?php echo date('Y-m-d');?>" required>
      </div>
    </div>
  </div>
    <button type="submit" align="center"class="btn">Ingresar</button>
    <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
  </form>
</div></div>
@include('layout.errors')
@endsection
