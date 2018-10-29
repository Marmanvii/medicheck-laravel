<?php
$i = 1;
?>
  <h3 class="text-center">Usuarios</h3>
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto; text-align:center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Rut</th>
        <th scope="col">Nombre</th>
      </tr>
    </thead>
    <tbody>
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
