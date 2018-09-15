@extends('layout.master')
<?php
$i = 1;
?>
@section('content')
  <h3 class="text-center">Mis Citas</h3>
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Médico</th>
        <th scope="col">Fecha</th>
        <th scope="col">Bloque</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($appointments as $appointments)
        @if(Auth::id()==$appointments->patient_id)
          <tr>
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
            @foreach ($users as $user)
              @if($user->id == $appointments->medics_id)
                <td>{{$user->name}}: {{$user->especialidad}}</td>
              @endif
            @endforeach
            <td>{{$appointments->fecha}}</td>
            <td>{{$appointments->bloque}}</td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  <main role="main" class="inner cover text-center">
    <h3></h3>
    <p class="lead">
      <a href="/appointments/create" class="btn btn-lg btn-secondary">Registrar Nueva Cita</a>
    </p>
  </main>
@endsection
