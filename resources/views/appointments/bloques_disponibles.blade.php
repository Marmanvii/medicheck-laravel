@extends('layout.master')
@section('content')
  <?php
    $dia = date("w",strtotime($fecha)); // obtenemos el día de la semana actual. Lunes = 1, Martes = 2...
  ?>
  <?php
    $j=0;
  ?>
  <h3 class="text-center">Seleccionar Bloque de Atención</h3>
  <table class="table table-striped table-bordered table-hover table-sm" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Horario</th>
        <th scope="col">Acción</th>
        <th scope="col">Disponibilidad</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($schedules as $schedule)<!--Recorremos la tabla de horarios para poder obtener los horarios de cada medico y asi modificar los bloques de manera dinamica-->
        @if($dia == '1')<!--Obtendremos el horario de atencion comparando con el dia actual de la semana y el valor del dia en el dia correspondiente-->
          <?php
          $atencion = $schedule->lunes; #Obtenemos el valor segun los lapsos de atencion (1=manana,2=tarde,3=manana y tarde)
          $duracion = $schedule->duracion; #obtenemos la duracion en minutos de atencion
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
      @if($atencion == '1')<!--Si es 1, significa que solo atiende en la mañana, por lo que definimos el inicio de atenciones a las 8am-->
        <?php
          $inicio = strtotime("08:00am");
          $final = strtotime("08:00am");
          $final = $inicio + ($duracion*60); #El final de el bloque de atencion consistira entonces en el inicio sumado en segundos la duracion de atencion segun el medico
          $limite = strtotime("01:00pm"); #Puede atender como maximo hasta las 1pm
        ?>
      @endif
      @if($atencion == '2')<!--Si es 2, significa que solo atiende en la tarde, por lo que el inicio de atencion comienza a las 2pm-->
        <?php
          $inicio = strtotime("02:00pm");
          $final = strtotime("02:00pm");
          $final = $inicio + ($duracion*60);
          $limite = strtotime("07:00pm"); #limite de atencion hasta las 7pm
        ?>
      @endif
      @if($atencion == '3')<!--Si es 3, atiende tanto en la mañana como en la tarde, de igual manera el inicio sera a las 8am-->
        <?php
          $inicio = strtotime("08:00am");
          $final = strtotime("08:00am");
          $final = $inicio + ($duracion*60);
          $limite_m = strtotime("01:00pm"); #Al poder atender tanto en la manana y tarde, se definen dos limites, manana hasta 1pm
          $limite_t = strtotime("07:00pm"); #Tarde hasta 7pm
        ?>
      @endif
      @if($atencion == '1' || $atencion == '2')<!--Si solo se atiende en la manana o en la tarde-->
        @while($final <= $limite) <!--Definimos bloques hasta el limite definido-->
          <tr>
            <th>{{$j+'1'}}</th><!--Como los bloques comienzan desde el 0, sumamos 1 para mostrar el orden desde el 1-->
            <th>{{date("H:i",$inicio)}} - {{date("H:i",$final)}}</th>
            <th>
              <?php $ok = 0; #0=no hay, 1=hay ?>
              @foreach ($appointments as $appointment)<!--Definimos el ok para identificar si la hora ya fue tomada o no-->
                @if ($appointment->medics_id == $medico)<!--De esta manera mandamos a una lista de espera si esta ocupada la hora-->
                  @if($appointment->fecha == $fecha)
                    @if($appointment->bloque == $j) <!--Significa que la hora fue tomadad con el mismo medico, a la misma hora, y a la misma fecha-->
                      <?php
                      $ok = 1;
                      $cita = $appointment->id; #Por lo que para la lista de espera, mandamos el id de la cita
                      ?>
                    @endif
                  @endif
                @endif
              @endforeach
              @if ($ok == 1) <!--Si la hora fue tomada, mandamos a lista de espera-->
                <form action="/waiting_list/create" method="POST">
                  {{csrf_field()}}
                  <input name="cita_id" type="hidden" value="{{$cita}}">
                  <button class="btn btn-dark btn-sm" type="submit">Lista de Espera</button>
                </form>
              @endif
              @if ($ok == 0)<!--Si no fue tomada, mandamos a llenar los datos restantes-->
                <form action="/appointments/create" method="POST">
                  {{csrf_field()}}
                  <input name="medics_id" type="hidden" value="{{$medico}}">
                  <input name="fecha" type="hidden" value="{{$fecha}}">
                  <input name="bloque" type="hidden" value="{{$j}}">
                  <button class="btn btn-dark btn-sm" type="submit">Seleccionar Hora</button>
                </form>
              @endif
            </th>
            @if ($ok == 1)
              <th>No Disponible</th>
            @endif
            @if ($ok == 0)
              <th>Disponible</th>
            @endif
          </tr>
          <?php
            $j=$j+1;
            $inicio = $final; #De esta manera, el siguiente bloque comienzaz donde termino el anterior
            $final = $inicio + ($duracion*60);
          ?>
        @endwhile
      @endif
      @if($atencion == '3')<!--Manana y tarde, usamos dos limites-->
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
                      <?php
                      $ok = 1;
                      $cita = $appointment->id;
                      ?>
                    @endif
                  @endif
                @endif
              @endforeach
              @if ($ok == 1)
                <form action="/waiting_list/create" method="POST">
                  {{csrf_field()}}
                  <input name="cita_id" type="hidden" value="{{$cita}}">
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
            @if ($ok == 1)
              <th>No Disponible</th>
            @endif
            @if ($ok == 0)
              <th>Disponible</th>
            @endif
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
          <tr><!--Diferenciamos manana y tarde-->
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
                      <?php
                      $ok = 1;
                      $cita = $appointment->id;
                      ?>
                    @endif
                  @endif
                @endif
              @endforeach
              @if ($ok == 1)
                <form action="/waiting_list/create" method="POST">
                  {{csrf_field()}}
                  <input name="cita_id" type="hidden" value="{{$cita}}">
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
