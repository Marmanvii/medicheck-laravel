@extends('layout.master')

@section('content')
  <h3 class="text-center">Seleccionar Intervalo del Reporte</h3>
  <form action="/report/medics/ingresos" method="GET" style="text-align: center;width:20%; margin:0px auto;">
      <div class="form-group">
        <label for="fecha">Fecha Inicial</label>
        <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial" required>
      </div>
      <div class="form-group" align="center">
        <label for="fecha">Fecha Final</label>
        <input type="date" class="form-control" id="fecha_final" name="fecha_final" max="<?php echo date('Y-m-d');?>" required>
      </div>
    <div class="form-group" align="center">
      <input name="medics_id" type="hidden" value="{{ old( 'medics_id', $medic) }}">
      <button type="submit" modified="false"  class="btn btn-primary">Siguiente</button>
    </div>
  </form>
@endsection
