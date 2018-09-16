@extends('layout.master')
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Registrar Nueva Cita</h1>
  <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/appointments">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="telefono">Teléfono</label>
        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="91213420" value="{{ old('telefono') }}" required>
      </div>
      <div class="form-group col-md-8">
        <label for="telefono">Médico</label>
        <select id="medics_id" class="form-control" name="medics_id" required>
          <option value="" disabled selected>Seleccione un médico...</option>
          @foreach($users as $medic) <!--Función de laravel, se busca por fila de la tabla, adquiriendo un medico y sus datos por ciclo, se obtiene desde el controlador, "as" sirve a modo de alias-->
            @if($medic->type=='medic')
              <option value="{{$medic->id}}">{{$medic->name}} {{$medic->last_name}}: {{$medic->especialidad}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="descripcion">Observación</label>
        <input type="textarea" class="form-control" id="observacion" name="observacion"  value="{{ old('observacion') }}" required>
      </div>
      <div class="form-group col-md-8">
        <label for="telefono">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" min="<?php echo date('Y-m-d');?>" required>
      </div>
    </div>
  </div>
    <input name="patient_id" type="hidden" value="{{old (Auth::id(), Auth::id())}}">
    <input name="bloque" type="hidden" value="1">
    <button type="submit" align="center"class="btn">Ingresar</button>
    <a class="btn btn-outline-light" role="main" href="/appointments">Regresar</a>
  </form>
@include('layout.errors')
@endsection
