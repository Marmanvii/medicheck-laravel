@if(Auth::user()->type!='admin')
  @php
    header("Location: /appointments")
  @endphp
@endif
@extends('layout.master')

@section('content')
  <h1 class="text-center">Seleccionar Fecha Inicial</h1>
  <form action="/report/medics/select_fecha_final" method="GET" style="text-align: center;width:20%; margin:0px auto;">
      <div class="form-group">
        <label for="fecha">Fecha Inicial</label>
        <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial" max="<?php echo date('Y-m-d');?>" required>
      </div>
    <div class="form-group" align="center">
      <input name="medics_id" type="hidden" value="{{ old( 'medics_id', $medic) }}">
      <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
      <button type="submit" modified="false"  class="btn btn-primary">Siguiente</button>
    </div>
  </form>
@endsection
