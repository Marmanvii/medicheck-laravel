@extends('layout.master')
<?php
$i = 1;
?>
@section('content')
  <h3 class="text-center">Citas del Día</h3>
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Bloque</th>
        <th scope="col">Paciente</th>
        <th scope="col">RUT</th>
        <th scope="col">Acción</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($appointments as $appointments)
        @if(Auth::id()==$appointments->medics_id and $appointments->fecha == now()->toDateString())
          <tr>
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
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
                  $tiempo = 0; #Lo hacemos 0 para no usar la duracion restante
                ?>
              @endif
            @endforeach
            @foreach ($users as $user)
              @if($user->id == $appointments->patient_id)
                <td>{{$user->name}} {{$user->last_name}}</td>
                <td>{{$user->rut}}</td>
              @endif
            @endforeach
            <td>
              <?php
                $j = 0;
              ?>
              <div class="btn-group">
              @foreach ($files as $file)
                @if($appointments->id == $file->appointment_id)
                  <button class="btn btn-dark btn-sm" type="button" disabled>📕</button>
                  <?php
                    $j = 1;
                  ?>
                @endif
              @endforeach
              @if ($j==0)
                <form action="/medics/filescreate" method="POST">
                  {{csrf_field()}}
                  <input name="appointment_id" type="hidden" value="{{$appointments->id}}">
                  <button class="btn btn-dark btn-sm" type="submit">📖</button>
                </form>
              @endif
              <form action="/medics/medicationscreate" method="POST">
                {{csrf_field()}}
                <input name="appointment_id" type="hidden" value="{{$appointments->id}}">
                <button class="btn btn-dark btn-sm" type="submit">💊</button>
              </form>
              <form action="/medics/record" method="POST">
                {{csrf_field()}}
                <input name="patient_id" type="hidden" value="{{$appointments->patient_id}}">
                <button class="btn btn-dark btn-sm" type="submit">👀</button>
              </form>
            </div>
            </td>
          </tr>
        @endif
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
