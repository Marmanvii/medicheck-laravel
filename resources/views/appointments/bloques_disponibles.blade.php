@extends('layout.master')
@section('content')
  <?php
    $dia = date("w",strtotime($fecha)); // obtenemos el día de la semana actual. Lunes = 1, Martes = 2...
  ?>
  <?php
    $j=0;
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
      @if($atencion == '1')
        <?php
          $inicio = strtotime("08:00am");
          $final = strtotime("08:00am");
          $final = $inicio + ($duracion*60);
          $limite = strtotime("01:00pm");
        ?>
      @endif
      @if($atencion == '2')
        <?php
          $inicio = strtotime("02:00pm");
          $final = strtotime("02:00pm");
          $final = $inicio + ($duracion*60);
          $limite = strtotime("07:00pm");
        ?>
      @endif
      @if($atencion == '3')
        <?php
          $inicio = strtotime("08:00am");
          $final = strtotime("08:00am");
          $final = $inicio + ($duracion*60);
          $limite_m = strtotime("01:00pm");
          $limite_t = strtotime("07:00pm");
        ?>
      @endif
      @if($atencion == '1' || $atencion == '2')
        @while($final <= $limite)
          <tr>
            <th>{{$j+'1'}}</th>
            <th>{{date("H:i",$inicio)}} - {{date("H:i",$final)}}</th>
            <th>
              <?php $ok = 0; #0=no hay, 1=hay ?>
              @foreach ($appointments as $appointment)
                @if ($appointment->medics_id == $medico)
                  @if($appointment->fecha == $fecha)
                    @if($appointment->bloque == $j)
                      <?php $ok = 1 ?>
                    @endif
                  @endif
                @endif
              @endforeach
              @if ($ok == 1)
                <form action="/appointments" method="POST"> <!-- Falta ruta para lista espera -->
                  {{csrf_field()}}
                  <input name="medics_id" type="hidden" value="{{$medico}}">
                  <input name="fecha" type="hidden" value="{{$fecha}}">
                  <input name="bloque" type="hidden" value="{{$j}}">
                  <button class="btn btn-dark btn-sm" type="submit">Lista de Espera</button>
                </form>
              @endif
              @if ($ok == 0)
                <form action="/appointments/create" method="POST">
                  {{csrf_field()}}
                  <input name="medics_id" type="hidden" value="{{$medico}}">
                  <input name="fecha" type="hidden" value="{{$fecha}}">
                  <input name="bloque" type="hidden" value="{{$j}}">
                  <button class="btn btn-dark btn-sm" type="submit">Seleccionar Hora</button>
                </form>
              @endif
            </th>
          </tr>
          <?php
            $j=$j+1;
            $inicio = $final;
            $final = $inicio + ($duracion*60);
          ?>
        @endwhile
      @endif
      @if($atencion == '3')
        @while($final <= $limite_m)
          <tr>
            <th>{{$j}}</th>
            <th>{{date("H:i",$inicio)}} - {{date("H:i",$final)}}</th>
            <th>
              <?php $ok = 0; #0=no hay, 1=hay ?>
              @foreach ($appointments as $appointment)
                @if ($appointment->medics_id == $medico)
                  @if($appointment->fecha == $fecha)
                    @if($appointment->bloque == $j)
                      <?php $ok = 1 ?>
                    @endif
                  @endif
                @endif
              @endforeach
              @if ($ok == 1)
                <form action="/appointments" method="POST"> <!-- Falta ruta para lista espera -->
                  {{csrf_field()}}
                  <input name="medics_id" type="hidden" value="{{$medico}}">
                  <input name="fecha" type="hidden" value="{{$fecha}}">
                  <input name="bloque" type="hidden" value="{{$j}}">
                  <button class="btn btn-dark btn-sm" type="submit">Lista de Espera</button>
                </form>
              @endif
              @if ($ok == 0)
                <form action="/appointments/create" method="POST">
                  {{csrf_field()}}
                  <input name="medics_id" type="hidden" value="{{$medico}}">
                  <input name="fecha" type="hidden" value="{{$fecha}}">
                  <input name="bloque" type="hidden" value="{{$j}}">
                  <button class="btn btn-dark btn-sm" type="submit">Seleccionar Hora</button>
                </form>
              @endif
            </th>
          </tr>
          <?php
            $j=$j+1;
            $inicio = $final;
            $final = $inicio + ($duracion*60);
          ?>
        @endwhile
        <?php
        $inicio = $inicio + 3600;
        $final = $final + 3600;
        ?>
          <tr>
            <th>---</th>
            <th>---</th>
            <th>---</th>
          </tr>
        @while($final <= $limite_t)
          <tr>
            <th>{{$j}}</th>
            <th>{{date("H:i",$inicio)}} - {{date("H:i",$final)}}</th>
            <th>
              <?php $ok = 0; #0=no hay, 1=hay ?>
              @foreach ($appointments as $appointment)
                @if ($appointment->medics_id == $medico)
                  @if($appointment->fecha == $fecha)
                    @if($appointment->bloque == $j)
                      <?php $ok = 1 ?>
                    @endif
                  @endif
                @endif
              @endforeach
              @if ($ok == 1)
                <form action="/appointments" method="POST"> <!-- Falta ruta para lista espera -->
                  {{csrf_field()}}
                  <input name="medics_id" type="hidden" value="{{$medico}}">
                  <input name="fecha" type="hidden" value="{{$fecha}}">
                  <input name="bloque" type="hidden" value="{{$j}}">
                  <button class="btn btn-dark btn-sm" type="submit">Lista de Espera</button>
                </form>
              @endif
              @if ($ok == 0)
                <form action="/appointments/create" method="POST">
                  {{csrf_field()}}
                  <input name="medics_id" type="hidden" value="{{$medico}}">
                  <input name="fecha" type="hidden" value="{{$fecha}}">
                  <input name="bloque" type="hidden" value="{{$j}}">
                  <button class="btn btn-dark btn-sm" type="submit">Seleccionar Hora</button>
                </form>
              @endif
            </th>
          </tr>
          <?php
            $j=$j+1;
            $inicio = $final;
            $final = $inicio + ($duracion*60);
          ?>
        @endwhile
      @endif
    </tbody>


@endsection
