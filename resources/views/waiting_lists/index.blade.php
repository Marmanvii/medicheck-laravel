@extends('layout.master')
<?php
$i = 1;
$fecha = now()->toDateString(); // obtenemos la fecha actual
$fecha = strtotime ( '+1 day' , strtotime ( $fecha ) ); // sumamos un día a la fecha actual
$fecha = date ( 'Y-m-j' , $fecha ); // cambiamos el formato
$dia= date("w",strtotime($fecha));
?>
@section('content')
  <h3 class="text-center">Lista de Espera</h3>

  @if ($dia == '1')
    <h3 class="text-center">Lunes: {{$fecha}}</h3>
    <h3 class="text-center">Bloque: {{date("H:i",$inicio)}} - {{date("H:i",$final)}}</h3>
  @endif
  @if ($dia == '2')
    <h3 class="text-center">Martes: {{$fecha}}</h3>
    <h3 class="text-center">Bloque: {{date("H:i",$inicio)}} - {{date("H:i",$final)}}</h3>
  @endif
  @if ($dia == '3')
    <h3 class="text-center">Miércoles: {{$fecha}}</h3>
    <h3 class="text-center">Bloque: {{date("H:i",$inicio)}} - {{date("H:i",$final)}}</h3>
  @endif
  @if ($dia == '4')
    <h3 class="text-center">Jueves: {{$fecha}}</h3>
    <h3 class="text-center">Bloque: {{date("H:i",$inicio)}} - {{date("H:i",$final)}}</h3>
  @endif
  @if ($dia == '5')
    <h3 class="text-center">Viernes: {{$fecha}}</h3>
    <h3 class="text-center">Bloque: {{date("H:i",$inicio)}} - {{date("H:i",$final)}}</h3>
  @endif
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Rut</th>
        <th scope="col">Paciente</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Observación</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($waiting_list as $waiting_list)
          @if ($waiting_list->appointment_id == $cita_id)
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
            @foreach ($users as $user)
              @if ($waiting_list->patient_id == $user->id)
                <th scope="row">{{$user->rut}}</th>
                <th scope="row">{{$user->name}} {{$user->last_name}}</th>
              @endif
            @endforeach
            <th scope="row">{{$waiting_list->telefono}}</th>
            <th scope="row">{{$waiting_list->observacion}}</th>
            <th scope="row">
              <form method="POST" action="{{ url('appointment/update/').$waiting_list->appointment_id}}">
                {{csrf_field()}}
                <input name="waiting_list_id" type="hidden" value="{{$waiting_list->id}}">
                <input name="patient_id" type="hidden" value="{{$waiting_list->patient_id}}">
                <input name="telefono" type="hidden" value="{{$waiting_list->telefono}}">
                <input name="observacion" type="hidden" value="{{$waiting_list->observacion}}">
                <button class="btn btn-dark btn-sm" type="submit">Seleccionar Hora</button>
                <!-- En caso de seleccionar desde la lista de espera a la tabla de las citas, se pasan los elementos necesarios para su actualización -->
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
      <a href="/appointments" class="btn btn-danger">Volver</a>
    </p>
  </main>
@endsection
