@if(Auth::user()->type!='admin')
  @php
    header("Location: /appointments")
  @endphp
@endif
<?php
$i = 1;
$cantidad = 0; #atenciones de cada médico
$total = 0; #dinero de cada médico
$acumulado = 0; #dinero de todos los médicos
$atenciones = 0; #atenciones de todos los médicos (sumadas)
?>
  <h3 class="text-center">Reporte de Ingresos</h3>
  <div class="table-wrapper-scroll-y">
    <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto; text-align:center;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Médico</th>
          <th scope="col">Cantidad Atenciones</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          @if ($user->type == 'medic')
            <tr>
              <th scope="row">{{"$i"}}</th>
              <?php
                $i = $i + 1;
              ?>
              <th scope="row">{{"$user->name"}} {{"$user->last_name "}}</th>
              @foreach ($appointments as $appointment)
                @if ($appointment->medics_id == $user->id)
                  @if ($appointment->fecha <= $final)
                    @if ($appointment->fecha >= $inicial)
                      <?php
                        $cantidad = $cantidad + 1;
                      ?>
                    @endif
                  @endif
                @endif
              @endforeach
              <?php
                $total = $cantidad*$user->valor;
                $acumulado = $acumulado + $total;
                $atenciones = $atenciones + $cantidad;
               ?>
              <th scope="row">{{"$cantidad"}}</th>
              <th scope="row">{{"$total"}}</th>
              <?php
                $total = 0;
                $cantidad = 0;
              ?>
            </tr>
          @endif
        @endforeach
        <tr>
          <th scope="row"></th>
          <th scope="row">Totales</th>
          <th scope="row">{{"$atenciones"}}</th>
          <th scope="row">{{"$acumulado"}}</th>
        </tr>
      </tbody>
    </table>
  </div>
