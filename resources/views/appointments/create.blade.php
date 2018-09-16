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
        <label for="telefono">placeholder</label>
        <input type="text" class="form-control" id="placeholder" name="placeholder" placeholder="placeholder" value="{{ old('telefono') }}" required>
      </div>
    </div>
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="descripcion">Observación</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion"  value="{{ old('descripcion') }}" required>
      </div>
      <div class="form-group col-md-8">
        <label for="telefono">placeholder2</label>
        <input type="text" class="form-control" id="placeholder2" name="placeholder2" placeholder="placeholder2" value="{{ old('telefono') }}" required>
      </div>
    </div>
  </div>
    <input name="patient_id" type="hidden" value="{{old (Auth::id(), Auth::id())}}">
    <input name="fecha" type="hidden" value="{{ old( 'fecha', $fecha) }}">
    <button type="submit" align="center"class="btn">Ingresar</button>
    <a class="btn btn-outline-light" role="main" href="/appointments">Regresar</a>
  </form>

@endsection
