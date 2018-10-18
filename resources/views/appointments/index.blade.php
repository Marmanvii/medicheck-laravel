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
          <tr>
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
            @foreach ($users as $user)
              @if($user->id == $appointments->medics_id)
                <td>{{$user->name}} {{$user->last_name}}</td>
              @endif
            @endforeach
        @endif
        @if((Auth::user()->type=='admin' || Auth::user()->type=='secre') && $appointments->fecha >= now()->toDateString())
          <tr>
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
            @foreach ($users as $user)
              @if($user->id == $appointments->patient_id)
                <td>{{$user->name}} {{$user->last_name}}</td>
              @endif
            @endforeach
            @foreach ($users as $user)
              @if($user->id == $appointments->medics_id)
                <td>{{$user->name}} {{$user->last_name}}</td>
              @endif
            @endforeach
        @endif
        @if(Auth::user()->type=='medic' && Auth::id()==$appointments->medics_id && $appointments->fecha >= now()->toDateString())
          <tr>
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
          @if(Auth::user()->type=='admin' || Auth::user()->type=='secre')
            <td>{{$appointments->telefono}}</td>
            <td>{{$appointments->observacion}}</td>
            <td>{{$appointments->fecha}}</td>
            <td>{{$appointments->bloque}}</td>
          @endif
          @if(Auth::user()->type=='medic' && Auth::id()==$appointments->medics_id)
            <td>{{$appointments->telefono}}</td>
             <td>{{$appointments->observacion}}</td>
             <td>{{$appointments->fecha}}</td>
             <td>{{$appointments->bloque}}</td>
          @endif
          @if(Auth::user()->type=='user' && Auth::id()==$appointments->patient_id)
            <td>{{$appointments->fecha}}</td>
            <td>{{$appointments->bloque}}</td>
          @endif
        @endif
            </tr>
      @endforeach
    </tbody>
  </table>
  <main role="main" class="inner cover text-center">
    <h3></h3>
    <p class="lead">
      <a href="/appointments/select_area" class="btn btn-lg btn-secondary">Registrar Nueva Cita</a>
    </p>
  </main>
@endsection
