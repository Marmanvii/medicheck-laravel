@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Registrar cita</h1>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
    <div class="card-body">
      <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/appointments">
      {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
        <div class="form-row">
          <div class="col" align="center">
            <div class="form-group col-md-8">
              <label for="telefono">Teléfono</label>
              <input type="number" class="form-control" id="telefono" name="telefono" placeholder="91213420" value="{{ old('telefono') }}" required>
            </div>
          </div>
          <div class="col" align="center">
            <div class="form-group col-md-8">
              <label for="descripcion">Observación</label>
              <input type="textarea" class="form-control" id="observacion" name="observacion"  value="{{ old('observacion') }}" required>
            </div>
          </div>
        </div>
        <input name="patient_id" type="hidden" value="{{old (Auth::id(), Auth::id())}}">
        <input name="fecha" type="hidden" value="{{ old( 'fecha', $fecha) }}">
        <input name="bloque" type="hidden" value="{{ old( 'bloque', $bloque) }}">
        <input name="medics_id" type="hidden" value="{{ old( 'medics_id', $medico) }}">
        <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
        <button type="submit" align="center"class="btn btn-primary">Ingresar</button>
      </form>
    </div>
  </div>
@include('layout.errors')
@endsection
