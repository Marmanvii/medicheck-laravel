<?php
$i = 0;
$j = 1;
?>
<h2 class="text-center">Historial Médico de {{Auth::user()->name}} {{Auth::user()->last_name}}</h2>
<h3 class="text-center">{{Auth::user()->rut}} - {{Auth::user()->email}}</h3>

@foreach ($appointments as $appointment)
  @if($appointment->patient_id == Auth::user()->id)
    @foreach ($files as $file)
      @if($file->appointment_id == $appointment->id)
        <h3 class="text-center">--------------------------------------------------------------------------------------------------------------------</h3>
        <h3 class="text-center"> {{$j}}.- {{$appointment->fecha}} / {{$file->diagnostico}} / {{$file->tratamiento}}</h3>
        <h5 class="text-center"> {{$file->descripcion}}</h4>
          <?php
            $j = $j + 1;
          ?>
            @foreach ($medications as $medication) <!-- Se verifica si hay medicamentos asociados a la cita-->
              @if($medication->appointment_id == $appointment->id)
                <?php
                  $i = 1;
                ?>
              @endif
            @endforeach

            @if ($i==1) <!-- Solo si hay medicamentos se carga la tabla-->

            <table class="table table-sm" style="width:80%; margin:0px auto;">
              <thead>
                <tr>
                  @if ($i==1) <!-- Solo si hay medicamentos se carga la tabla-->
                    <th scope="col">Nombre</th>
                    <th scope="col">Intervalo</th>
                    <th scope="col">Duración</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @if ($i==1) <!-- Solo si hay medicamentos se vuelven a recorrer-->
                  @foreach ($medications as $medication)
                    @if($medication->appointment_id == $appointment->id)
                      <tr>
                        <td>{{$medication->nombre}}</td>
                        <td>{{$medication->intervalo}}</td>
                        <td>{{$medication->duracion}}</td>
                      </tr>
                    @endif
                  @endforeach
                @endif
              </tbody>
            </table>
          @endif
          </div>
        </div>
      @endif
      <?php
        $i= 0 
      ?>
    @endforeach
  @endif
@endforeach
