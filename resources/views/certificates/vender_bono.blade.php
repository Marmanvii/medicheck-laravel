@extends('layout.master')
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
<h1 align="center">Buscar Paciente por RUT</h1>
<div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
  <div class="card-body">
  <form method="GET" style="text-align: center;width:80%; margin:0px auto;" action="/certificates/results_search">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
    <div class="form-row">
      <div class="col" align="center">
        <div class="form-group col-md-8">
          <label for="rut">RUT</label>
          <input type="textarea" class="form-control" id="rut" name="rut"  value="{{ old('rut') }}" required>
        </div>
      </div>
    </div>
    <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
    <button type="submit" align="center"class="btn btn-primary">Ingresar</button>
  </form>
  </div>
</div>

@include('layout.errors')
@endsection
