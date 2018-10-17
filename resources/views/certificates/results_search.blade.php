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
        <th scope="col">RUT</th>
        <th scope="col">Acción</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($appointments as $appointments)
        @foreach ($user as $user)
          @if($user->id == $appointments->patient_id)
              <tr>
                <th scope="row">{{"$i"}}</th>
                <?php
                  $i = $i + 1;
                ?>
                @if ($appointments->bloque == 1)
                  <td>8:30 - 9:00</td>
                @endif
                @if($appointments->bloque == 2)
                  <td>9:00 - 9:30</td>
                @endif
                @if ($appointments->bloque == 3)
                  <td>9:30 - 10:00</td>
                @endif
                @if ($appointments->bloque == 4)
                  <td>10:00 - 10:30</td>
                @endif
                @if ($appointments->bloque == 5)
                  <td>10:30 - 11:00</td>
                @endif
                @if ($appointments->bloque == 6)
                  <td>11:00 - 11:30</td>
                @endif
                @if ($appointments->bloque == 7)
                  <td>11:30 - 12:00</td>
                @endif
                @if ($appointments->bloque == 8)
                  <td>12:00 - 12:30</td>
                @endif
                @if ($appointments->bloque == 9)
                  <td>12:30 - 13:00</td>
                @endif
                @if ($appointments->bloque == 10)
                  <td>15:00 - 15:30</td>
                @endif
                @if ($appointments->bloque == 11)
                  <td>15:30 - 16:00</td>
                @endif
                @if ($appointments->bloque == 12)
                  <td>16:00 - 16:30</td>
                @endif
                @if ($appointments->bloque == 13)
                  <td>16:30 - 17:00</td>
                @endif
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
                      <input name="appointment_id" type="hidden" value="{{$appointments->id}}">
                      <button class="btn btn-dark btn-sm" type="submit">📖</button>
                    </form>
                  @endif
                </div>
                </td>
              </tr>
          @endif
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
