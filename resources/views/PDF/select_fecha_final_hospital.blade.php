@extends('layout.master')

@section('content')
  <h1 class="text-center">Seleccionar Fecha Final</h1>
  <form action="/report/hospital/ingresos" method="GET" style="text-align: center;width:20%; margin:0px auto;">
      <div class="form-group">
        <label for="fecha">Fecha Final</label>
        <input type="date" class="form-control" id="fecha_final" name="fecha_final" min= "{{$fecha_inicial}}" max="<?php echo date('Y-m-d');?>" required><!-- La fecha mínima es igual a la fecha inicial, así evitamos que la fecha inicial sea superior a la fecha final-->
      </div>
    <div class="form-group" align="center">
      <input name="fecha_inicial" type="hidden" value="{{ old( 'fecha_inicial', $fecha_inicial) }}">
      <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
      <button type="submit" modified="false"  class="btn btn-primary">Siguiente</button>
    </div>
  </form>
@endsection
