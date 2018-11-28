@if(Auth::user()->type!='admin')
  @php
    header("Location: /appointments")
  @endphp
@endif
<?php
$i = 0;
$acumulador = 0;
$costo = 0;
?>
  <h2 class="text-center">Ingresos por Médico</h2>
  @foreach ($user as $user)
    <h4 class="text-center">Nombre: {{$user->name}} {{$user->last_name}}</h4>
    <h4 class="text-center">Rut: {{$user->rut}}</h4>
    <h4 class="text-center">Email: {{$user->email}}</h4>
    <?php
    $costo = $user->valor;
    ?>
  @endforeach
  <br></br>
  <h2 class="text-center">Intervalo de Consulta</h2>
  <h4 class="text-center">Fecha Inicial: {{$inicial}}</h4>
  <h4 class="text-center">Fecha Final: {{$final}}</h4>
  @foreach ($appointments as $appointment)
    @if ($appointment->medics_id == $medic)
      @if ($appointment->fecha >= $inicial)
        @if ($appointment->fecha <= $final)
          <?php
            $i = $i + 1;
          ?>
        @endif
      @endif
    @endif
  @endforeach
  <?php
  $costo = $costo*($i);
  ?>
  <br></br>
  <h2 class="text-center">Estadísticas</h2>
  <h4 class="text-center">Cantidad de Consultas: {{$i}}</h4>
  <h4 class="text-center">Ganancia Total: {{$costo}}</h4>
