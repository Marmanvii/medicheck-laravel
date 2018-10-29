@extends('layout.master')
<?php
$i = 1;
$count = 0; #Usaremos el count para determinar si ya se ha vendido un bono para una cita
?>
@section('content')
  <h3 class="text-center">Venta de Bonos</h3><!--La busqueda se hace filtrando el usuario en el controlador por su RUT-->
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fecha</th>
        <th scope="col">Bloque</th>
        <th scope="col">Médico</th>
        <th scope="col">RUT Paciente</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($user as $user)
        @foreach ($appointments as $appointment)
          @foreach ($certificates as $certificate)
            @if ($appointment->id == $certificate->appointment_id)<!--De ya existir un bono para una cita, aumentamos el count para decir que ya existe un bono-->
              @php
                $count = $count+1;
              @endphp
            @endif
          @endforeach
          @if($count == 0 && $user->id == $appointment->patient_id && $appointment->fecha >= now()->toDateString()) <!--Si no existe el bono, mostramos las posibles citas para vender un bono-->
              <tr>
                <th scope="row">{{"$i"}}</th>
                <?php
                  $i = $i + 1;
                ?>
                <th scope="row">{{$appointment->fecha}}</th>
                @foreach ($schedules as $schedule) <!--Explicado en index de appointments-->
                  @if($schedule->medics_id == $appointment->medics_id)
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
                <td>
                  @foreach ($medics as $medic)
                    @if ($appointment->medics_id == $medic->id)
                      {{$medic->name}} {{$medic->last_name}}
                    @endif
                  @endforeach
                </td>
                <td>
                  {{$user->rut}}
                </td>
                <td>
                  <?php
                    $j = 0;
                  ?>
                  <div class="btn-group">
                  @if ($j==0)
                    <form action="/certificates/create" method="POST">
                      {{csrf_field()}}
                      <input name="appointment_id" type="hidden" value="{{$appointment->id}}">
                      <button class="btn btn-dark btn-sm" type="submit">Vender Bono</button>
                    </form>
                  @endif
                </div>
                </td>
              </tr>
          @endif
          @php
            $count = 0;
          @endphp
        @endforeach
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
