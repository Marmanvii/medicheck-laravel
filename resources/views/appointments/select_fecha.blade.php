@extends('layout.master')
<?php
$i = 1;
?>
@section('content')
  <h3 class="text-center">Seleccionar Fecha</h3>
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fecha</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
  <tbody>
    <tr>
      <th scope="row">{{"$i"}}</th>
      <?php
        $i = $i + 1;
      ?>
      <!-- FECHAS -->






      <th scope="row">Fechas</th>






      <!-- FECHAS -->
      <th scope="row">
        <form action="/appointments/bloques_disponibles" method="POST">
          {{csrf_field()}}
          <input name="appointment_id" type="hidden" value="">
          <button class="btn btn-dark btn-sm" type="submit">Seleccionar Fecha</button>
        </form>
      </th>
    </tr>
  </tbody>
  </table>
<main role="main" class="inner cover text-center">
  <h3></h3>
  <p class="lead">
    <a href="/appointments" class="btn btn-lg btn-secondary">Volver</a>
  </p>
</main>
@endsection
