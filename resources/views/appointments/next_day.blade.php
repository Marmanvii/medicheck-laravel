@extends('layout.master')
<?php
$i = 1;
$fecha = now()->toDateString(); // obtenemos la fecha actual
$fecha = strtotime ( '+3 day' , strtotime ( $fecha ) ); // sumamos un día a la fecha actual
$fecha = date ( 'Y-m-j' , $fecha ); // cambiamos el formato
?>
@section('content')
  <h3 class="text-center">Citas Próximo Día</h3>
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Rut</th>
        <th scope="col">Paciente</th>
        <th scope="col">Médico</th>
        <th scope="col">Bloque</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Observación</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($appointments as $appointment)
          @if ($appointment->fecha == $fecha)
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
            @foreach ($users as $user)
              @if ($appointment->patient_id == $user->id)
                <th scope="row">{{$user->rut}}</th>
                <th scope="row">{{$user->name}} {{$user->last_name}}</th>
              @endif
            @endforeach
            @foreach ($schedules as $schedule)
              @if($schedule->medics_id == $appointment->medics_id)
                @foreach ($users as $user)
                  @if ($appointment->medics_id == $user->id)
                    <th scope="row">{{$user->name}} {{$user->last_name}}</th>
                  @endif
                @endforeach
                <?php
                  $duracion = $schedule->duracion;
                  $dia = date("w",strtotime($appointment->fecha));
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
                    $tiempo = ($duracion*60)*$appointment->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                @endif
                @if($atencion == '2')
                  <?php
                    $inicio = strtotime("02:00pm");
                    $final = strtotime("02:00pm");
                    $tiempo = ($duracion*60)*$appointment->bloque;
                    $inicio = $inicio + $tiempo;
                    $final = $inicio + ($duracion*60);
                  ?>
                @endif
                @if($atencion == '3')
                  <?php
                    $inicio = strtotime("08:00am");
                    $final = strtotime("08:00am");
                    $tiempo = ($duracion*60)*$appointment->bloque;
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
            <th scope="row">{{$appointment->telefono}}</th>
            <th scope="row">{{$appointment->observacion}}</th>
            <th scope="row">
              <form action="/waiting_list_show" method="POST">
                {{csrf_field()}}
                <input name="appointment_id" type="hidden" value="{{$appointment->id}}">
                <input name="hora_inicio" type="hidden" value="{{$inicio}}">
                <input name="hora_final" type="hidden" value="{{$final}}">
                <button class="btn btn-dark btn-sm" type="submit">Lista de Espera</button>
              </form>
            </th>
          @endif
        </tr>
        @endforeach

    </tbody>
  </table>
  <main role="main" class="inner cover text-center">
    <h3></h3>
    <p class="lead">
      <a href="/appointments" class="btn btn-lg btn-secondary">Volver</a>
    </p>
  </main>
@endsection
