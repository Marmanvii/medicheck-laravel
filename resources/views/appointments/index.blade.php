@extends('layout.master')
<?php
$i = 1;
?>
@section('content')
  @if(Auth::user()->type=='user')
    <h3 class="text-center">Mis Citas</h3>
  @else
    <h3 class="text-center">Próximas Citas</h3>
  @endif
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        @if(Auth::user()->type=='user')
          <th scope="col">Médico</th>
        @endif
        @if(Auth::user()->type=='medic')
          <th scope="col">Paciente</th>
        @endif
        @if(Auth::user()->type=='admin' || Auth::user()->type=='secre')
          <th scope="col">Paciente</th>
          <th scope="col">Médico</th>
        @endif
        @if(Auth::user()->type!='user')
          <th scope="col">Teléfono</th>
          <th scope="col">Observación</th>
        @endif
        <th scope="col">Fecha</th>
        <th scope="col">Bloque</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($appointments as $appointments)
        @if(Auth::id()==$appointments->patient_id  && Auth::user()->type=='user' && $appointments->fecha >= now()->toDateString())
          <tr> <!--Filtro el total de citas a todas aquellas que sean del usuario actual, que sea un usuario normal y que sean las fechas posterior o igual a la actual-->
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?><!--Simplemente aumenta el i para definir el numero de fila-->
            @foreach ($users as $user)
              @if($user->id == $appointments->medics_id)
                <td>{{$user->name}} {{$user->last_name}}</td> <!--Busco en la tabla de usuarios el nombre y apellido del medico a traves de su id-->
              @endif
            @endforeach
        @endif
        @if((Auth::user()->type=='admin' || Auth::user()->type=='secre') && $appointments->fecha >= now()->toDateString()) <!--Al ser el usuario un admin o una secretaria, mostrara las citas de todos los pacientes-->
          <tr>
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
            @foreach ($users as $user)
              @if($user->id == $appointments->patient_id)
                <td>{{$user->name}} {{$user->last_name}}</td> <!--Ademas de mostrar los datos del medico, mostramos los datos del paciente-->
              @endif
            @endforeach
            @foreach ($users as $user)
              @if($user->id == $appointments->medics_id)
                <td>{{$user->name}} {{$user->last_name}}</td>
              @endif
            @endforeach
        @endif
        @if(Auth::user()->type=='medic' && Auth::id()==$appointments->medics_id && $appointments->fecha >= now()->toDateString())
          <tr> <!--En este caso, de ser el medico que este buscando las citas, se mostraran todas las citas que le correspondan atender-->
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
            @foreach ($users as $user)
              @if($user->id == $appointments->patient_id)
                <td>{{$user->name}} {{$user->last_name}}</td>
              @endif
            @endforeach
        @endif
        @if ($appointments->fecha >= now()->toDateString())
          @if(Auth::user()->type=='admin' || Auth::user()->type=='secre') <!--Solo el admin o secretaria puede ver el telefono, observacion de cada cita-->
            <td>{{$appointments->telefono}}</td>
            <td>{{$appointments->observacion}}</td>
            <td>{{$appointments->fecha}}</td>
            @foreach ($schedules as $schedule)<!--Recorremos la tabla de horarios para poder obtener los horarios de cada medico y asi modificar los bloques de manera dinamica-->
              @if($schedule->medics_id == $appointments->medics_id) <!--Como cada horario esta definido a cada medico por su id, obtendremos este horario comparando con el id almacenado en la cita-->
                <?php
                $duracion = $schedule->duracion; #Una vez obtenido, guardaremos la duracion (en minutos) de cada cita
                $dia = date("w",strtotime($appointments->fecha)); #Ademas obtendremos el dia de la semana actual de la cita (del 1 al 7 representa el dia)
                ?>
                @if($dia == '1') <!--Por lo que al ser del 1 al 7, obtendremos el horario de atencion comparando con el dia actual de la semana y el valor del dia en el dia correspondiente-->
                  <?php
                  $atencion = $schedule->lunes;
                  ?>
                @endif
                @if($dia == '2')
                  <?php
                  $atencion = $schedule->martes;
                  ?>
                @endif
                @if($dia == '3')
                  <?php
                  $atencion = $schedule->miercoles;
                  ?>
                @endif
                @if($dia == '4')
                  <?php
                  $atencion = $schedule->jueves;
                  ?>
                @endif
                @if($dia == '5')
                  <?php
                  $atencion = $schedule->viernes;
                  ?>
                @endif
                @if($atencion == '1') <!--Si es 1, significa que solo atiende en la mañana, por lo que definimos el inicio de atenciones a las 8am-->
                  <?php
                    $inicio = strtotime("08:00am");
                    $final = strtotime("08:00am");
                    $tiempo = ($duracion*60)*$appointments->bloque; #Ahora dependiendo del bloque (integer), multiplicamos la duracion por 60 (al ser en segundos) y lo multplicamos por el bloque para que nos de
                                                                    #el total de tiempo transcurrido para poder obtener el lapso de hora de atencion correspondiente
                    $inicio = $inicio + $tiempo; #Le agregamos al inicio de atencion el tiempo transcurrido en segundos segun el bloque de atencion
                    $final = $inicio + ($duracion*60); #Agregamos ademas al final para asi obtener el  lapso de atencion segun la duracion de atencion de cada medico
                  ?>
                @endif
                @if($atencion == '2') <!--Si es 2, significa que solo atiende en la tarde, por lo que el inicio de atencion comienza a las 2pm-->
                  <?php
                    $inicio = strtotime("02:00pm");
                    $final = strtotime("02:00pm");
                    $tiempo = ($duracion*60)*$appointments->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                @endif
                @if($atencion == '3')<!--Si es 3, atiende tanto en la mañana como en la tarde, de igual manera el inicio sera a las 8am-->
                  <?php
                    $inicio = strtotime("08:00am");
                    $final = strtotime("08:00am");
                    $tiempo = ($duracion*60)*$appointments->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                  @if($inicio >= strtotime("01:00pm")) <!--Al llegar al limite de atencion de la mañana, se agrega una hora para poder continuar a las 2pm, atencion de la tarde-->
                    <?php
                      $inicio = $inicio + 3600;
                      $final = $final + 3600;
                    ?>
                  @endif
                @endif
                <td>{{date("H:i",$inicio)}} - {{date("H:i",$final)}}</td> <!--Se usa la funcion date para mostrar en formato Horas:minutos el lapso de atencion desde su inicio hasta su final-->
                <?php
                  $tiempo = 0; #Se vuelve 0 para no usar el tiempo calculado anteriormente
                ?>
              @endif
            @endforeach
          @endif
          @if(Auth::user()->type=='medic' && Auth::id()==$appointments->medics_id) <!--Al ser medico puede ver el telefono y observacion ingresados por el paciente-->
            <td>{{$appointments->telefono}}</td>
            <td>{{$appointments->observacion}}</td>
            <td>{{$appointments->fecha}}</td>
            @foreach ($schedules as $schedule)
              @if($schedule->medics_id == $appointments->medics_id)
                <?php
                $duracion = $schedule->duracion;
                $dia = date("w",strtotime($appointments->fecha));
                ?>
                @if($dia == '1')
                  <?php
                  $atencion = $schedule->lunes;
                  ?>
                @endif
                @if($dia == '2')
                  <?php
                  $atencion = $schedule->martes;
                  ?>
                @endif
                @if($dia == '3')
                  <?php
                  $atencion = $schedule->miercoles;
                  ?>
                @endif
                @if($dia == '4')
                  <?php
                  $atencion = $schedule->jueves;
                  ?>
                @endif
                @if($dia == '5')
                  <?php
                  $atencion = $schedule->viernes;
                  ?>
                @endif
                @if($atencion == '1')
                  <?php
                    $inicio = strtotime("08:00am");
                    $final = strtotime("08:00am");
                    $tiempo = ($duracion*60)*$appointments->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                @endif
                @if($atencion == '2')
                  <?php
                    $inicio = strtotime("02:00pm");
                    $final = strtotime("02:00pm");
                    $tiempo = ($duracion*60)*$appointments->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                @endif
                @if($atencion == '3')
                  <?php
                    $inicio = strtotime("08:00am");
                    $final = strtotime("08:00am");
                    $tiempo = ($duracion*60)*$appointments->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                  @if($inicio >= strtotime("01:00pm"))
                    <?php
                      $inicio = $inicio + 3600;
                      $final = $final + 3600;
                    ?>
                  @endif
                @endif
                <td>{{date("H:i",$inicio)}} - {{date("H:i",$final)}}</td>
                <?php
                  $tiempo = 0;
                ?>
              @endif
            @endforeach
          @endif
          @if(Auth::user()->type=='user' && Auth::id()==$appointments->patient_id)<!--En cambio el paciente solo ve la fecha de su atencion-->
            <td>{{$appointments->fecha}}</td>
            @foreach ($schedules as $schedule)
              @if($schedule->medics_id == $appointments->medics_id)
                <?php
                $duracion = $schedule->duracion;
                $dia = date("w",strtotime($appointments->fecha));
                ?>
                @if($dia == '1')
                  <?php
                  $atencion = $schedule->lunes;
                  ?>
                @endif
                @if($dia == '2')
                  <?php
                  $atencion = $schedule->martes;
                  ?>
                @endif
                @if($dia == '3')
                  <?php
                  $atencion = $schedule->miercoles;
                  ?>
                @endif
                @if($dia == '4')
                  <?php
                  $atencion = $schedule->jueves;
                  ?>
                @endif
                @if($dia == '5')
                  <?php
                  $atencion = $schedule->viernes;
                  ?>
                @endif
                @if($atencion == '1')
                  <?php
                    $inicio = strtotime("08:00am");
                    $final = strtotime("08:00am");
                    $tiempo = ($duracion*60)*$appointments->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                @endif
                @if($atencion == '2')
                  <?php
                    $inicio = strtotime("02:00pm");
                    $final = strtotime("02:00pm");
                    $tiempo = ($duracion*60)*$appointments->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                @endif
                @if($atencion == '3')
                  <?php
                    $inicio = strtotime("08:00am");
                    $final = strtotime("08:00am");
                    $tiempo = ($duracion*60)*$appointments->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                  @if($inicio >= strtotime("01:00pm"))
                    <?php
                      $inicio = $inicio + 3600;
                      $final = $final + 3600;
                    ?>
                  @endif
                @endif
                <td>{{date("H:i",$inicio)}} - {{date("H:i",$final)}}</td>
                <?php
                  $tiempo = 0; #Se vuelve 0 para no usar el tiempo calculado anteriormente
                ?>
              @endif
            @endforeach
          @endif
        @endif
            </tr>
      @endforeach
    </tbody>
  </table>
  <main role="main" class="inner cover text-center">
    <h3></h3>
    <p class="lead">
      <a href="/appointments/select_area" class="btn btn-primary">Registrar Nueva Cita</a>
    </p>
  </main>
@endsection
