@extends('layout.master')
@section('content')
  <?php
    $dia = date("w",strtotime($fecha)); // obtenemos el día de la semana actual. Lunes = 1, Martes = 2...
  ?>
  <?php
    $j=1;
  ?>
  <h3 class="text-center">Seleccionar Fecha</h3>
  <table class="table table-striped table-bordered table-hover table-sm" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Horario</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($schedules as $schedule)
        @if($dia == '1')
          <?php
          $atencion = $schedule->lunes;
          $duracion = $schedule->duracion;
          ?>
        @endif
        @if($dia == '2')
          <?php
          $atencion = $schedule->martes;
          $duracion = $schedule->duracion;
          ?>
        @endif
        @if($dia == '3')
          <?php
          $atencion = $schedule->miercoles;
          $duracion = $schedule->duracion;
          ?>
        @endif
        @if($dia == '4')
          <?php
          $atencion = $schedule->jueves;
          $duracion = $schedule->duracion;
          ?>
        @endif
        @if($dia == '5')
          <?php
          $atencion = $schedule->viernes;
          $duracion = $schedule->duracion;
          ?>
        @endif
      @endforeach
      @if($atencion == '1' || $atencion == '3')
        <?php
          $inicio = strtotime("08:00am");
          $final = strtotime("08:00am");
          $final = $inicio + ($duracion*60);
        ?>
      @endif
      @if($atencion == '2')
        <?php
          $inicio = strtotime("02:00pm");
          $final = strtotime("02:00pm");
          $final = $inicio + ($duracion*60);
        ?>
      @endif

    </tbody>
<h1>hola {{date("H:i", $inicio)}}{{date("H:i", $final)}}</h1>

@endsection
