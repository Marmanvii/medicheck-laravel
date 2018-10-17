@extends('layout.master')
<?php
  $fecha= now()->toDateString();  // obtenemos la fecha actual
  $dia= date("w",strtotime($fecha)); // obtenemos el día de la semana actual. Lunes = 1, Martes = 2...
?>
<?php
  $j=1;
?>
@section('content')
  <h3 class="text-center">Seleccionar Fecha</h3>
  <table class="table table-striped table-bordered table-hover table-sm" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fecha</th>
        <th scope="col">Horario</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
  <tbody>
    <tr>
      @for ($i=1; $i < 31; $i++)
        @if($dia == '1' || $dia == '2' || $dia == '3' || $dia == '4' || $dia == '5')
          <!-- FECHAS -->
          @foreach ($schedules as $schedule)
            @if ($medic == $schedule->medics_id)
              @if ($dia == '1')
                @if ($schedule->lunes != '0')
                  <th scope="row">{{"$j"}}</th>
                  <?php
                    $j=$j+1;
                  ?>
                  <th scope="row">Lunes: {{$fecha}}</th>
                  @if ($schedule->lunes == '1')
                    <th scope="row">Solo en la Mañana</th>
                  @endif
                  @if ($schedule->lunes == '2')
                    <th scope="row">Solo en la Tarde</th>
                  @endif
                  @if ($schedule->lunes == '3')
                    <th scope="row">Mañana y Tarde</th>
                  @endif
                  <th scope="row">
                    <form action="/appointments/bloques_disponibles" method="POST">
                      {{csrf_field()}}
                      <input name="fecha_cita" type="hidden" value="{{$fecha}}">
                      <button class="btn btn-dark btn-sm" type="submit">Seleccionar Fecha</button>
                    </form>
                  </th>
                @endif
              @endif
              @if ($dia == '2')
                @if ($schedule->martes != '0')
                  <th scope="row">{{"$j"}}</th>
                  <?php
                    $j=$j+1;
                  ?>
                  <th scope="row">Martes: {{$fecha}}</th>
                  @if ($schedule->martes == '1')
                    <th scope="row">Solo en la Mañana</th>
                  @endif
                  @if ($schedule->martes == '2')
                    <th scope="row">Solo en la Tarde</th>
                  @endif
                  @if ($schedule->martes == '3')
                    <th scope="row">Mañana y Tarde</th>
                  @endif
                  <th scope="row">
                    <form action="/appointments/bloques_disponibles" method="POST">
                      {{csrf_field()}}
                      <input name="fecha_cita" type="hidden" value="{{$fecha}}">
                      <button class="btn btn-dark btn-sm" type="submit">Seleccionar Fecha</button>
                    </form>
                  </th>
                @endif
              @endif
              @if ($dia == '3')
                @if ($schedule->miercoles != '0')
                  <th scope="row">{{"$j"}}</th>
                  <?php
                    $j=$j+1;
                  ?>
                  <th scope="row">Miércoles: {{$fecha}}</th>
                  @if ($schedule->miercoles == '1')
                    <th scope="row">Solo en la Mañana</th>
                  @endif
                  @if ($schedule->miercoles == '2')
                    <th scope="row">Solo en la Tarde</th>
                  @endif
                  @if ($schedule->miercoles == '3')
                    <th scope="row">Mañana y Tarde</th>
                  @endif
                  <th scope="row">
                    <form action="/appointments/bloques_disponibles" method="POST">
                      {{csrf_field()}}
                      <input name="fecha_cita" type="hidden" value="{{$fecha}}">
                      <button class="btn btn-dark btn-sm" type="submit">Seleccionar Fecha</button>
                    </form>
                  </th>
                @endif
              @endif
              @if ($dia == '4')
                @if ($schedule->jueves != '0')
                  <th scope="row">{{"$j"}}</th>
                  <?php
                    $j=$j+1;
                  ?>
                  <th scope="row">Jueves: {{$fecha}}</th>
                  @if ($schedule->jueves == '1')
                    <th scope="row">Solo en la Mañana</th>
                  @endif
                  @if ($schedule->jueves == '2')
                    <th scope="row">Solo en la Tarde</th>
                  @endif
                  @if ($schedule->jueves == '3')
                    <th scope="row">Mañana y Tarde</th>
                  @endif
                  <th scope="row">
                    <form action="/appointments/bloques_disponibles" method="POST">
                      {{csrf_field()}}
                      <input name="fecha_cita" type="hidden" value="{{$fecha}}">
                      <button class="btn btn-dark btn-sm" type="submit">Seleccionar Fecha</button>
                    </form>
                  </th>
                @endif
              @endif
              @if ($dia == '5')
                @if ($schedule->viernes != '0')
                  <th scope="row">{{"$j"}}</th>
                  <?php
                    $j=$j+1;
                  ?>
                  <th scope="row">Viernes: {{$fecha}}</th>
                  @if ($schedule->viernes == '1')
                    <th scope="row">Solo en la Mañana</th>
                  @endif
                  @if ($schedule->viernes == '2')
                    <th scope="row">Solo en la Tarde</th>
                  @endif
                  @if ($schedule->viernes == '3')
                    <th scope="row">Mañana y Tarde</th>
                  @endif
                  <th scope="row">
                    <form action="/appointments/bloques_disponibles" method="POST">
                      {{csrf_field()}}
                      <input name="fecha_cita" type="hidden" value="{{$fecha}}">
                      <button class="btn btn-dark btn-sm" type="submit">Seleccionar Fecha</button>
                    </form>
                  </th>
                @endif
              @endif
            @endif
          @endforeach
          <!-- FECHAS -->
      </tr>
    @endif
      <?php
        $fecha=strtotime ( '+1 day' , strtotime ( $fecha ) ); // sumamos un día a la fecha
        $fecha = date ( 'Y-m-j' , $fecha ); // pasamos al formato Año - Mes - Día
        $dia= date("w",strtotime($fecha));
      ?>
    @endfor


  </tbody>
  </table>
<main role="main" class="inner cover text-center">
  <h3></h3>
  <p class="lead">
    <a href="/appointments" class="btn btn-lg btn-secondary">Volver</a>
  </p>
</main>
@endsection
