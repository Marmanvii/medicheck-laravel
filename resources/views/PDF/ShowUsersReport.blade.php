@extends('layout.master')
<?php
$i = 1;
?>
@section('content')
  <h3 class="text-center">Reporte de Usuarios</h3>
  <div class="table-wrapper-scroll-y">
    <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto; text-align:center;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Rut</th>
          <th scope="col">Nombre</th>
        </tr>
      </thead>
      <tbody {width: 200px; height: 400px; overflow: auto;}>
        @foreach ($users as $user)
          <tr>
            <th scope="row">{{"$i"}}</th>
            <?php
              $i = $i + 1;
            ?>
            <td>{{$user->rut}} </td>
            <td>{{$user->name}} </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <main role="main" class="inner cover text-center">
    <pre class="tab"> </pre> <!-- Espacio por estética-->
    <p class="lead">
      <a href="/appointments" class="btn btn-danger">Volver</a>
      <a class="btn btn-primary" href="/report/users/download">Descargar PDF</a> <!-- Botón para probar los PDF-->
    </p>
  </main>
@endsection
